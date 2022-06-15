
# Package to simplify how you connect to AQWhatsapp Services

[![Latest Version on Packagist](https://img.shields.io/packagist/v/aquadic/aqwhatsapp.svg?style=flat-square)](https://packagist.org/packages/aquadic/aqwhatsapp)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/aquadic/aqwhatsapp/run-tests?label=tests)](https://github.com/aquadic/aqwhatsapp/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/aquadic/aqwhatsapp/Check%20&%20fix%20styling?label=code%20style)](https://github.com/aquadic/aqwhatsapp/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/aquadic/aqwhatsapp.svg?style=flat-square)](https://packagist.org/packages/aquadic/aqwhatsapp)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require aquadic/aqwhatsapp
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="aqwhatsapp-config"
```

This is the contents of the published config file:

```php
return [
    /*
    |--------------------------------------------------------------------------
    | API TOKEN TO AUTHENTICATE WITH AQ SERVER. (YOU CAN CREATE ONE FROM PROFILE).
    */
    'api_token' => env('AQ_WHATSAPP_API_TOKEN', null),

    /*
    |--------------------------------------------------------------------------
    | SESSION UUID (THIS IS UNIQUE FOR EACH SESSION).
    */
    'session_uuid' => env('AQ_WHATSAPP_SESSION_UUID', null),
];
```

## Usage

```php
$aQWhatsapp = new AQuadic\AQWhatsapp();
echo $aQWhatsapp->sendMessage.......
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [AQuadic](https://github.com/AQuadic)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
