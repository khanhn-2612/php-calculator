# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project

A Laravel package (`khanhn-2612/php-calculator`) providing basic arithmetic operations. Requires PHP 8.2+ and supports Laravel 9/10/11/12.

## Commands

```bash
composer install                              # install dependencies
./vendor/bin/phpunit                          # run all tests
./vendor/bin/phpunit --filter test_add        # run a single test
```

## Architecture

```
src/
  Calculator.php              # core class — arithmetic, math ops, rounding; static chain() factory
  Chain.php                   # fluent wrapper returned by Calculator::chain(value)
  CalculatorServiceProvider.php  # registers 'calculator' singleton in the container
  Facades/Calculator.php      # facade pointing to the 'calculator' binding
tests/
  CalculatorTest.php          # plain PHPUnit tests (no testbench needed)
```

The package uses Laravel's auto-discovery (`extra.laravel` in `composer.json`) so no manual provider registration is needed in host apps.

Namespace: `KhanhN\Calculator\`
