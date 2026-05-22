<?php

namespace KhanhN\Calculator;

class Calculator
{
    // ── Basic arithmetic ──────────────────────────────────────────────────────

    public function add(float $a, float $b): float
    {
        return $a + $b;
    }

    public function subtract(float $a, float $b): float
    {
        return $a - $b;
    }

    public function multiply(float $a, float $b): float
    {
        return $a * $b;
    }

    public function divide(float $a, float $b): float
    {
        if ($b === 0.0) {
            throw new \DivisionByZeroError('Division by zero is not allowed.');
        }

        return $a / $b;
    }

    // ── Extra math ────────────────────────────────────────────────────────────

    public function power(float $base, float $exponent): float
    {
        return $base ** $exponent;
    }

    public function sqrt(float $number): float
    {
        if ($number < 0) {
            throw new \InvalidArgumentException('Cannot take square root of a negative number.');
        }

        return sqrt($number);
    }

    public function modulo(float $a, float $b): float
    {
        if ($b === 0.0) {
            throw new \DivisionByZeroError('Division by zero is not allowed.');
        }

        return fmod($a, $b);
    }

    public function abs(float $number): float
    {
        return abs($number);
    }

    /** Returns $percent % of $total (e.g. percentage(200, 15) === 30.0) */
    public function percentage(float $total, float $percent): float
    {
        return $total * $percent / 100;
    }

    // ── Rounding ──────────────────────────────────────────────────────────────

    public function round(float $number, int $precision = 0): float
    {
        return round($number, $precision);
    }

    public function floor(float $number): float
    {
        return floor($number);
    }

    public function ceil(float $number): float
    {
        return ceil($number);
    }

    // ── Fluent chain ──────────────────────────────────────────────────────────

    public static function chain(float $value): Chain
    {
        return new Chain($value);
    }
}
