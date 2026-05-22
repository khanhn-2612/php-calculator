# php-calculator

A basic calculator package for Laravel.

## Requirements

- PHP 8.2+
- Laravel 9 / 10 / 11 / 12

## Installation

```bash
composer require khanhn-2612/php-calculator
```

Laravel auto-discovers the service provider via package auto-discovery.

## Usage

### Direct instantiation

```php
use KhanhN\Calculator\Calculator;

$calc = new Calculator();

// Basic arithmetic
$calc->add(2, 3);            // 5.0
$calc->subtract(5, 2);       // 3.0
$calc->multiply(2, 4);       // 8.0
$calc->divide(10, 2);        // 5.0

// Extra math
$calc->power(2, 3);          // 8.0
$calc->sqrt(16);             // 4.0
$calc->modulo(10, 3);        // 1.0
$calc->abs(-7);              // 7.0
$calc->percentage(200, 15);  // 30.0  (15% of 200)

// Rounding
$calc->round(3.456, 2);      // 3.46
$calc->floor(3.9);           // 3.0
$calc->ceil(3.1);            // 4.0
```

### Fluent chain API

```php
use KhanhN\Calculator\Calculator;

$result = Calculator::chain(100)
    ->add(50)
    ->subtract(20)
    ->multiply(2)
    ->divide(4)
    ->round(2)
    ->result(); // 65.0
```

### Via facade

```php
use KhanhN\Calculator\Facades\Calculator;

Calculator::add(2, 3);
Calculator::chain(100)->add(50)->result();
```

## Testing

```bash
composer install
./vendor/bin/phpunit
```
