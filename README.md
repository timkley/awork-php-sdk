# awork.io PHP SDK

[![Latest Version on Packagist](https://img.shields.io/packagist/v/timkley/awork-php-sdk.svg?style=flat-square)](https://packagist.org/packages/timkley/awork-php-sdk)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/timkley/awork-php-sdk/run-tests?label=tests)](https://github.com/timkley/awork-php-sdk/actions?query=workflow%3Arun-tests+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/timkley/awork-php-sdk.svg?style=flat-square)](https://packagist.org/packages/timkley/awork-php-sdk)

This is a wrapper around the [awork API](https://openapi.awork.io/). It is still a WIP and not all endpoints are implemented.

## Installation

### Requirements

> PHP 8.0

### With composer

```bash
composer require timkley/awork-php-sdk
```

## Usage

You need an [API token](https://developers.awork.io/authentication) to use the awork API.

```php
<?php

$awork = new Awork('your-token');

// Get all users
$awork->users()->get();

// Get a specific project
$awork->projects()->getProject('your-product-uuid');

// Post a comment on a specific task
$awork->comments()->create('tasks', 'your-task-uuid', 'Your message');
```

## Testing

```bash
./vendor/bin/pest
```

## Todo

- [ ] Implement missing endpoints

## Credits

I took a lot of inspiration from existing packages like [mailgun/mailgun-php](https://github.com/mailgun/mailgun-php)
or [lepikhinb/fathom-api](https://github.com/lepikhinb/fathom-api).

Thanks for contributing to open source!

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
