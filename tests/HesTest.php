<?php

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use IsaEken\Hes\Hes;
use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertInstanceOf;
use function PHPUnit\Framework\assertTrue;

$mock = new MockHandler();
$handlerStack = HandlerStack::create($mock);
Hes::client([
    'handler' => $handlerStack,
]);

it('send code for login', function () use ($mock) {
    $status = collect([201, 300, 400, 500])->random();
    $mock->append(new Response($status));

    try {
        $sent = Hes::sendCode('+90 545 000 0000');
    } catch (RequestException $requestException) {
        $sent = false;
    }

    if ($status == 201) {
        assertTrue($sent);
    } else {
        assertFalse($sent);
    }
});

it('login with password', function () use ($mock) {
    $status = collect([200, 401])->random();
    $mock->append(new Response($status, [], file_get_contents(__DIR__.'/Mock/login.json')));

    try {
        $hes = Hes::login('000000', '5450000000');
    } catch (RequestException $requestException) {
        $hes = false;
    }

    if ($status == 200) {
        assertInstanceOf(Hes::class, $hes);
    } else {
        assertFalse($hes);
    }
});
