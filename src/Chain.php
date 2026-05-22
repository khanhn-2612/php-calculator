<?php

namespace KhanhN\Calculator;

class Chain
{
    private float $value;

    public function __construct(float $value)
    {
        $this->value = $value;
    }

    // ── Basic arithmetic ──────────────────────────────────────────────────────

    public function add(float $b): static
    {
        $this->value += $b;

        return $this;
    }

    public function subtract(float $b): static
    {
        $this->value -= $b;

        return $this;
    }

    public function multiply(float $b): static
    {
        $this->value *= $b;

        return $this;
    }

    public function divide(float $b): static
    {
        if ($b === 0.0) {
            throw new \DivisionByZeroError('Division by zero is not allowed.');
        }

        $this->value /= $b;

        return $this;
    }

    // ── Extra math ────────────────────────────────────────────────────────────

    public function power(float $exponent): static
    {
        $this->value = $this->value ** $exponent;

        return $this;
    }

    public function sqrt(): static
    {
        if ($this->value < 0) {
            throw new \InvalidArgumentException('Cannot take square root of a negative number.');
        }

        $this->value = sqrt($this->value);

        return $this;
    }

    public function modulo(float $b): static
    {
        if ($b === 0.0) {
            throw new \DivisionByZeroError('Division by zero is not allowed.');
        }

        $this->value = fmod($this->value, $b);

        return $this;
    }

    public function abs(): static
    {
        $this->value = abs($this->value);

        return $this;
    }

    /** Converts the current value to $percent % of itself (e.g. chain(200)->percentage(15) === 30.0) */
    public function percentage(float $percent): static
    {
        $this->value = $this->value * $percent / 100;

        return $this;
    }

    // ── Rounding ──────────────────────────────────────────────────────────────

    public function round(int $precision = 0): static
    {
        $this->value = round($this->value, $precision);

        return $this;
    }

    public function floor(): static
    {
        $this->value = floor($this->value);

        return $this;
    }

    public function ceil(): static
    {
        $this->value = ceil($this->value);

        return $this;
    }

    // ── Terminal ──────────────────────────────────────────────────────────────

    public function result(): float
    {
        return $this->value;
    }
}
