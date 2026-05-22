<?php

namespace KhanhN\Calculator;

use Illuminate\Support\ServiceProvider;

class CalculatorServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton('calculator', fn () => new Calculator());
    }

    public function boot(): void
    {
        //
    }
}
