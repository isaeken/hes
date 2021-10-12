<?php

namespace IsaEken\Hes;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use IsaEken\Hes\Models\HesCode;
use IsaEken\Hes\Models\User;
use IsaEken\Hes\Traits\HasPhone;
use IsaEken\Hes\Traits\HasToken;
use IsaEken\Thinks\Cache;
use IsaEken\Thinks\Model;
use JetBrains\PhpStorm\ArrayShape;
use Throwable;

/**
 * @property string $id_token
 * @property string $phone
 *
 * @method string getToken()
 * @method string setToken(string $token)
 * @method string getPhone()
 * @method string setPhone(string $phone)
 */
class Hes extends Model
{
    use HasPhone;
    use HasToken;

    public const Endpoint = 'https://hessvc.saglik.gov.tr';

    /**
     * @var Client|null
     */
    private static Client|null $client = null;

    /**
     * @var Cache|null
     */
    private Cache|null $cache = null;

    /**
     * @return Client
     */
    public static function client(): Client
    {
        if (static::$client === null) {
            static::$client = new Client();
        }

        return static::$client;
    }

    /**
     * @param  string  $phone
     * @return bool
     * @throws GuzzleException
     */
    public static function sendCode(string $phone): bool
    {
        return static::client()->request('POST', static::Endpoint.'/api/send-code-to-login', [
                RequestOptions::JSON => [
                    'phone' => '+90'.$phone,
                ],
            ])->getStatusCode() === 201;
    }

    /**
     * @param  string  $code
     * @param  string  $phone
     * @return false|static
     * @throws GuzzleException
     */
    public static function login(string $code, string $phone): static|false
    {
        $request = static::client()->request('POST', static::Endpoint.'/api/authenticate-with-code', [
            RequestOptions::JSON => [
                'password' => $code,
                'phone' => '+90'.$phone,
                'rememberMe' => true,
            ],
        ]);

        if ($request->getStatusCode() !== 200) {
            return false;
        }

        $user = new User(json_decode($request->getBody()->getContents(), true));
        $hes = new static($user->getToken());
        $hes->cache->set('user', $user);

        return $hes;
    }

    /**
     * @param  string|null  $token
     * @param  string|null  $phone
     */
    public function __construct(string|null $token = null, string|null $phone = null)
    {
        parent::__construct();
        $this->setToken($token);
        $this->setPhone($phone);
        $this->cache = new Cache();
    }

    #[ArrayShape(['Content-Type' => "string", 'Authorization' => "string"])]
    private function makeHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer '.$this->getToken(),
        ];
    }

    /**
     * @param  bool  $freshen
     * @return User|false
     */
    public function getUser(bool $freshen = false): User|false
    {
        return $this->cache->remember('user', function () {
            throw_if($this->getToken() === null);

            $request = static::client()->request('GET', static::Endpoint.'/api/account-with-token', [
                RequestOptions::HEADERS => $this->makeHeaders(),
            ]);

            if ($request->getStatusCode() !== 200) {
                return false;
            }

            $response = json_decode($request->getBody()->getContents(), true);
            $response['token'] = $response['id_token'] = $this->getToken();

            return (new User())->fill($response);
        }, $freshen);
    }

    /**
     * @param  bool  $freshen
     * @return Collection|false
     * @throws Throwable
     */
    public function getCodes(bool $freshen = false): Collection|false
    {
        return $this->cache->remember('codes', function () {
            throw_if($this->getToken() === null);

            $request = static::client()->request('POST', static::Endpoint.'/services/hescodeproxy/api/hes-codes', [
                RequestOptions::HEADERS => $this->makeHeaders(),
            ]);

            if ($request->getStatusCode() !== 200) {
                return false;
            }

            $codes = [];
            foreach (json_decode($request->getBody()->getContents(), true) as $code) {
                $code['id'] = $code['hes_code'];
                $codes[$code['id']] = new HesCode($code);
            }

            return collect($codes);
        }, $freshen);
    }

    /**
     * @param  string  $code
     * @param  bool  $freshen
     * @return HesCode|false
     * @throws Throwable
     */
    public function getCode(string $code, bool $freshen = false): HesCode|false
    {
        return $this->cache->remember('code-'.$code, function () use ($code) {
            throw_if($this->getToken() === null);

            $code = Str::replace(['-', ' '], '', $code);
            $request = static::client()->request('POST', static::Endpoint.'/services/hescodeproxy/api/check-hes-code', [
                RequestOptions::HEADERS => $this->makeHeaders(),
                RequestOptions::JSON => [
                    'hes_code' => $code,
                ],
            ]);

            if ($request->getStatusCode() !== 200) {
                return false;
            }

            $object = new HesCode(json_decode($request->getBody()->getContents(), true));
            $object->id = $code;
            $object->hes_code = $code;

            if ($this->cache->has('codes')) {
                $codes = $this->cache->get('codes') ?? collect();
                if (array_key_exists($object->id, $codes->toArray())) {
                    $code = $codes[$code];
                    foreach ($object->attributes as $key => $value) {
                        if ($code->$key == null) {
                            $code->$key = $value;
                        }
                    }
                    $codes[$object->id] = $code;
                }
            }

            return $object;
        }, $freshen);
    }
}
