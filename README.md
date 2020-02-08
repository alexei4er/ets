# Event Ticket Store

[![Build Status](https://travis-ci.org/alexei4er/event-ticket-store.svg?branch=master)](https://travis-ci.org/alexei4er/event-ticket-store)
[![styleci](https://styleci.io/repos/CHANGEME/shield)](https://styleci.io/repos/CHANGEME)
[![Coverage Status](https://coveralls.io/repos/github/alexei4er/event-ticket-store/badge.svg?branch=master)](https://coveralls.io/github/alexei4er/event-ticket-store?branch=master)

[![Packagist](https://img.shields.io/packagist/v/alexei4er/event-ticket-store.svg)](https://packagist.org/packages/alexei4er/event-ticket-store)
[![Packagist](https://poser.pugx.org/alexei4er/event-ticket-store/d/total.svg)](https://packagist.org/packages/alexei4er/event-ticket-store)
[![Packagist](https://img.shields.io/packagist/l/alexei4er/event-ticket-store.svg)](https://packagist.org/packages/alexei4er/event-ticket-store)

Package description: CHANGE ME

## Installation

Install via composer
```bash
composer require alexei4er/event-ticket-store
```

```bash
php artisan ets:install
```

## Remove tables and migrations

```bash
php artisan ets:uninstall
```

### Publish Configuration File

```bash
php artisan vendor:publish --provider="Alexei4er\EventTicketStore\ServiceProvider" --tag="ets_config"
```

### Publish Views

```bash
php artisan vendor:publish --provider="Alexei4er\EventTicketStore\ServiceProvider" --tag="ets_views"
```

## Usage

CHANGE ME

## Security

If you discover any security related issues, please email
instead of using the issue tracker.

## Credits

- [](https://github.com/alexei4er/event-ticket-store)
- [All contributors](https://github.com/alexei4er/event-ticket-store/graphs/contributors)

This package is bootstrapped with the help of
[melihovv/laravel-package-generator](https://github.com/melihovv/laravel-package-generator).
