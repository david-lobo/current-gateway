# A Laravel Facade to access the Current RMS Api

## Installation

You can install the package via composer:

```bash
composer require jjsoftwareltd/current-gateway
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
The response is returned as an associative array.

```php
CurrentGateway::get('opportunities', ['page' => 1]);

CurrentGateway::post('opportunities', ['subject' => 'My Job']);

CurrentGateway::put('opportunities/1', ['subject' => 'My Job']);

CurrentGateway::delete('opportunities/1');

```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [audiojames](https://github.com/audiojames)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
