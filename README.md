# laravel-datadog-helper

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]
[![StyleCI](https://styleci.io/repos/64763895/shield?branch=master)](https://styleci.io/repos/64763895)

Laravel Datadog Helper helps you get your application metrics integrated into Laravel as fast as possible.

### Requirements

* Laravel >= 5
* Datadog API Key

### Features

* Adds Datadog facade that wraps the official [DataDog/php-datadogstatsd](https://github.com/DataDog/php-datadogstatsd) library
* Provides middleware for tracking response time metrics automatically
* Allows prefixing all metrics that are sent for the whole application with common prefix

## Installation

Require this package with composer.

```shell
composer require chaseconey/laravel-datadog-helper
```

Laravel 5.5 uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider.

If you would like to install the request metric tracking middleware, add the Datadog middleware class like so:

``` php

// app/Http/Kernal.php

protected $middleware = [
    ...

    \ChaseConey\LaravelDatadogHelper\Middleware\LaravelDatadogMiddleware::class
];
```

### Without Auto-Discovery (or Laravel < 5.5)

If you don't use auto-discovery, or you are using an older version of Laravel, add the ServiceProvider to the providers array in `config/app.php`

``` php

// config/app.php

'providers' => [
    ...
    
    ChaseConey\LaravelDatadogHelper\LaravelDatadogHelperServiceProvider::class,
];
```

If you want to use the facade, add this to your facades in `config/app.php`:

``` php

// config/app.php

'aliases' => [
    ...
    
    'Datadog' => ChaseConey\LaravelDatadogHelper\Datadog::class
];
```

For configuration options, copy the package config to your local config with the publish command:

```shell
php artisan vendor:publish --provider="ChaseConey\LaravelDatadogHelper\LaravelDatadogHelperServiceProvider"
```

## Examples

This library wraps the official [DataDog/php-datadogstatsd](https://github.com/DataDog/php-datadogstatsd) library. All functions are inherited from the core implementation provided by this library with the exception of replacing `Datadogstatsd` with `Datadog` (the facade).

For example:

Instead of doing `Datadogstatsd::increment('my.sweet.metrics')`, you would use `Datadog::increment('my.sweet.metrics')`.

For a full set of usage examples, [check out the library's usage README](https://github.com/DataDog/php-datadogstatsd#usage).

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
