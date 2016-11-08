## Push

A Push manager to send push messages to mobile devices from your project.

[![Total downloads](https://img.shields.io/packagist/dt/nodes/service-auth.svg)](https://packagist.org/packages/nodes/service-auth)
[![Monthly downloads](https://img.shields.io/packagist/dm/nodes/service-auth.svg)](https://packagist.org/packages/nodes/service-auth)
[![Latest release](https://img.shields.io/packagist/v/nodes/service-auth.svg)](https://packagist.org/packages/nodes/service-auth)
[![Open issues](https://img.shields.io/github/issues/nodes-php/service-auth.svg)](https://github.com/nodes-php/service-auth/issues)
[![License](https://img.shields.io/packagist/l/nodes/service-auth.svg)](https://packagist.org/packages/nodes/service-auth)
[![Star repository on GitHub](https://img.shields.io/github/stars/nodes-php/service-auth.svg?style=social&label=Star)](https://github.com/nodes-php/service-auth/stargazers)
[![Watch repository on GitHub](https://img.shields.io/github/watchers/nodes-php/service-auth.svg?style=social&label=Watch)](https://github.com/nodes-php/service-auth/watchers)
[![Fork repository on GitHub](https://img.shields.io/github/forks/nodes-php/service-auth.svg?style=social&label=Fork)](https://github.com/nodes-php/service-auth/network)
[![StyleCI](https://styleci.io/repos/73100002/shield)](https://styleci.io/repos/73100002)

## 📝 Introduction

At [Nodes](http://nodesagency.com)

## 📦 Installation

To install this package you will need:

* Laravel 5.2+
* PHP 7.0+


You must then modify your `composer.json` file and run `composer update` to include the latest version of the package in your project.

```json
"require": {
    "nodes/service-auth": "^0.1.0"
}
```

Or you can run the composer require command from your terminal.

```bash
composer require nodes/service-auth
```

## 🔧 Setup

Setup service provider in `config/app.php`

```php
Nodes\ServiceAuthenticator\ServiceProvider::class
```

Publish config files

```bash
php artisan vendor:publish --provider="Nodes\ServiceAuthenticator\ServiceProvider"
```

If you want to overwrite any existing config files use the `--force` parameter

```bash
php artisan vendor:publish --provider="Nodes\ServiceAuthenticator\ServiceProvider" --force
```

## ⚙ Usage

### Global method

```php
auth_service();
```

###Example
TODO
```

## 🏆 Credits

This package is developed and maintained by the PHP team at [Nodes Agency](http://nodesagency.com)

[![Follow Nodes PHP on Twitter](https://img.shields.io/twitter/follow/nodesphp.svg?style=social)](https://twitter.com/nodesphp) [![Tweet Nodes PHP](https://img.shields.io/twitter/url/http/nodesphp.svg?style=social)](https://twitter.com/nodesphp)

## 📄 License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
