# Laravel Twitter handle validation

[![Latest Version on Packagist](https://img.shields.io/packagist/v/bruno-fernandes/laravel-twitter-handle-validation.svg?style=flat-square)](https://packagist.org/packages/bruno-fernandes/laravel-twitter-handle-validation)
[![Build Status](https://img.shields.io/travis/bruno-fernandes/laravel-twitter-handle-validation/master.svg?style=flat-square)](https://travis-ci.org/bruno-fernandes/laravel-twitter-handle-validation)
[![Quality Score](https://img.shields.io/scrutinizer/g/bruno-fernandes/laravel-twitter-handle-validation.svg?style=flat-square)](https://scrutinizer-ci.com/g/bruno-fernandes/laravel-twitter-handle-validation)
[![Total Downloads](https://img.shields.io/packagist/dt/bruno-fernandes/laravel-twitter-handle-validation.svg?style=flat-square)](https://packagist.org/packages/bruno-fernandes/laravel-twitter-handle-validation)

Simple twitter handle validation.

## Installation

You can install the package via composer:

```bash
composer require bruno-fernandes/laravel-twitter-handle-validation
```

## Usage

``` php
use Illuminate\Support\Facades\Validator;
$validator = Validator::make(['handle' => '@ invalid'], ['handle' => 'twitter_handle']);
if ($validator->fails()) {
    // twitter handle validation failed
}
```

To add a custom validation error message go to views/lang/validation.php file and add:
``` php
return [
    'twitter_handle' => 'Twitter handle is not valid.'
];
```


### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email bruno@brunofernandes.com instead of using the issue tracker.

## Credits

- [Bruno Fernandes](https://github.com/bruno-fernandes)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
