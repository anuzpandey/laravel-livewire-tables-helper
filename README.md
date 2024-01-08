### A small reusable, utility package for livewire tables package.

- Package: `rappasoft/laravel-livewire-tables`

[![Latest Version on Packagist](https://img.shields.io/packagist/v/anuzpandey/laravel-livewire-tables-helper.svg?style=flat-square)](https://packagist.org/packages/anuzpandey/laravel-livewire-tables-helper)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/anuzpandey/laravel-livewire-tables-helper/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/anuzpandey/laravel-livewire-tables-helper/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/anuzpandey/laravel-livewire-tables-helper/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/anuzpandey/laravel-livewire-tables-helper/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/anuzpandey/laravel-livewire-tables-helper.svg?style=flat-square)](https://packagist.org/packages/anuzpandey/laravel-livewire-tables-helper)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require anuzpandey/laravel-livewire-tables-helper
```

## Usage

- Serial Number Column
This trait will add a serial number column to your table. The Trait utilize the `prependColumns` method from the `rappasoft/laravel-livewire-tables` package.
You can use this trait in your table component like this:
```php
use AnuzPandey\LaravelLivewireTablesHelper\Traits\HasSerialNumberColumn;

class UserTable extends Component
{
    use HasSerialNumberColumn;
}
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [AnuzPandey](https://github.com/AnuzPandey)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
