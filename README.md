# laravel-datadog-helper

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Laravel Datadog Helper helps you get your application metrics integrated into Laravel as fast as possible.

Features:

* Adds Datadog facade
* Provides middleware for tracking response time metrics automatically

## Usage

### Step 1: Install Through Composer

```
composer require chaseconey/laravel-datadog-helper
```

### Step 2: Add Service Provider to providers array in app config file.

``` php

// config/app.php

'providers' => [
    ...
    
    ChaseConey\LaravelDatadogHelper\LaravelDatadogHelperServiceProvider::class,
];
```

### Step 3: Add Facade

``` php

// config/app.php

'aliases' => [
    ...
    
    'Datadog' => ChaseConey\LaravelDatadogHelper\Datadog::class
];
```

### Step 4: Register Middleware

``` php

// app/Http/Kernal.php

protected $middleware = [
        ...
        
        \ChaseConey\LaravelDatadogHelper\Middleware\LaravelDatadogMiddleware::class
    ];
```

### Step 5: Publish configuration

```php
php artisan vendor:publish --provider="ChaseConey\LaravelDatadogHelper\LaravelDatadogHelperServiceProvider"
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Credits

- [Chase Coney][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/chaseconey/laravel-datadog-helper.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/chaseconey/laravel-datadog-helper/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/chaseconey/laravel-datadog-helper.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/chaseconey/laravel-datadog-helper.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/chaseconey/laravel-datadog-helper.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/chaseconey/laravel-datadog-helper
[link-travis]: https://travis-ci.org/chaseconey/laravel-datadog-helper
[link-scrutinizer]: https://scrutinizer-ci.com/g/chaseconey/laravel-datadog-helper/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/chaseconey/laravel-datadog-helper
[link-downloads]: https://packagist.org/packages/chaseconey/laravel-datadog-helper
[link-author]: https://github.com/chaseconey
[link-contributors]: ../../contributors
