# Sonar-Valiable

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

## Install

Via Composer

``` bash
$ composer require sonar/valiable:dev-master
```

Add ServiceProvider in config.php
``` php
    'providers' => [
        :
        :
        Sonar\Valiable\ValiableServiceProvider::class,
    ],

    'aliases' => [
        :
        :
        'Valiable' => Sonar\Valiable\ValiableFacade::class,
    ],
```

Artisan Command
``` bash
$ php artisan vendor:publish
```

Create Valiables Directory to storage_path
put Yaml Files to Valiables Direcoty 

Example:
``` file
properties:
  parameter_kinds:
    name: "種別"
    value:
      "1": "土地"
      "2": "一戸建て"
      "3": "マンション"
```

Valiable Import
``` bash
$ php artisan valiable:import
```

Example Code
``` php
use Valiable;

print_r(Valiable::get('properties_parameter_kinds')); # Array([1] => 土地 [2] => 一戸建て [3] => マンション )
print_r(Valiable::getValue('properties_parameter_kinds',1)); # 土地
print_r(Valiable::getNames()); # Array([0] => properties_parameter_kinds)

```


<!--
## Usage

``` php
$skeleton = new League\Skeleton();
echo $skeleton->echoPhrase('Hello, League!');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email :author_email instead of using the issue tracker.
-->

## Credits

- [dev-sonar][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/sonar/valiable.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-circleci]: https://circleci.com/gh/dev-sonar/sonar-valiable.svg?style=shield&circle-token=d9c8812dec2ac73a00306fcfadaaa1528b6f8ce2
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/dev-sonar/sonar-valiable.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/dev-sonar/sonar-valiable.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/sonar/valiable.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/sonar/valiable
[link-circleci]: https://circleci.com/gh/dev-sonar/sonar-valiable
[link-scrutinizer]: https://scrutinizer-ci.com/g/dev-sonar/sonar-valiable/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/dev-sonar/sonar-valiable
[link-downloads]: https://packagist.org/packages/sonar/valiable
[link-author]: https://github.com/dev-sonar
[link-contributors]: ../../contributors

