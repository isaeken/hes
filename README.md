# Hayat Eve Sığar Api

## Kurulum

```
composer require isaeken/hes
```

## Kullanım

### Oturum açma

```php
$telefon_numarasi = '5450000000';
$token = null;

// telefon numarasına sms gönderin.
// başarılı ise true başarısız ise false
\IsaEken\Hes\Hes::sendCode($telefon_numarasi); // bool

// sms ile gelen kod aracılığıyla oturum açın.
$hes = \IsaEken\Hes\Hes::login('kod', $telefon_numarasi);

// açılan oturumdan tokeni alın.
$token = $hes->getToken();

// bu tokeni kayıt ederek daha sonrasında sms kullanmadan oturum açabilirsin.
$hes = new \IsaEken\Hes\Hes($token, $telefon_numarasi);
```

### Kullanıcı bilgilerini alma

```php
$user = $hes->getUser();
// varsayılan olarak memory cache'e kayıt edilir oradan veri çekilir bunu istemiyorsan $freshen değerini true yap.
$user = $hes->getUser(freshen: true);

// tüm değerleri Model sınıfı sayesinde kontrol edebilirsin. örnek:
$user->getIsolationEndDate(); // Carbon
$user->getAttribute('isolationEndDate'); // Carbon
$user->attributes['isolationEndDate']; // string
```

### Hes kodlarını listeleme

```php
$codes = $hes->getCodes(freshen: false); // Collection
$codes->first(); // HesCode
```

### Hes kodu sorgulama

```php
$code = $hes->getCode('KOD'); // HesCode
```
