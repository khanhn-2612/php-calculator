# php-calculator

A basic calculator package for Laravel.

## Requirements

- PHP 8.0+
- Laravel 9 / 10 / 11

## Installation

```bash
composer require khanhn/php-calculator
```

Laravel auto-discovers the service provider via package auto-discovery.

## Usage

```php
// Via dependency injection
use KhanhN\Calculator\Calculator;

$calc = new Calculator();
$calc->add(2, 3);       // 5.0
$calc->subtract(5, 2);  // 3.0
$calc->multiply(2, 4);  // 8.0
$calc->divide(10, 2);   // 5.0

// Via facade
use KhanhN\Calculator\Facades\Calculator;

Calculator::add(2, 3);
```

## Testing

```bash
composer install
./vendor/bin/phpunit
```
