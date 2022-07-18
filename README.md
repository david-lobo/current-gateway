# A Laravel Facade to access the Current RMS Api

## Installation

You can install the package via composer:

```bash
composer require jjsoftwareltd/current-gateway
```

Add the repository to your composer.json:

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "git@github.com:JJSoftwareLtd/current-gateway.git"
        }
    ]
}
```

Add your subdmoain and key to your env file:

```bash
CURRENT_SUBDOMAIN=
CURRENT_KEY=
```

You can optionally publish the config file with:

```bash
php artisan vendor:publish --tag="current-gateway-config"
```

## Usage

```php
$data = CurrentGateway::get();
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/audiojames/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [audiojames](https://github.com/audiojames)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
