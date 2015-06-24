# Widgets

[![Latest Version on Packagist](https://img.shields.io/packagist/v/humweb/widgets.svg?style=flat-square)](https://packagist.org/packages/humweb/widgets)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/humweb/widgets/master.svg?style=flat-square)](https://travis-ci.org/humweb/widgets)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/humweb/widgets.svg?style=flat-square)](https://scrutinizer-ci.com/g/humweb/widgets/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/humweb/widgets.svg?style=flat-square)](https://scrutinizer-ci.com/g/humweb/widgets)
[![Total Downloads](https://img.shields.io/packagist/dt/humweb/widgets.svg?style=flat-square)](https://packagist.org/packages/humweb/widgets)


## Install

Via Composer

``` bash
$ composer require humweb/widgets
```

## Usage

``` php
$widgets = new WidgetFactory();

$this->widgets->register('foo', function($val = '') {
    return 'bar'.$val;
});

echo $this->widgets->foo('baz');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email ryun@humboldtweb.com instead of using the issue tracker.

## Credits

- [Ryan Shofner](https://github.com/ryun)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.