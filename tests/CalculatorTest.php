<?php

namespace KhanhN\Calculator\Tests;

use KhanhN\Calculator\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    private Calculator $calculator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->calculator = new Calculator();
    }

    public function test_add(): void
    {
        $this->assertEquals(5.0, $this->calculator->add(2, 3));
    }

    public function test_subtract(): void
    {
        $this->assertEquals(1.0, $this->calculator->subtract(3, 2));
    }

    public function test_multiply(): void
    {
        $this->assertEquals(6.0, $this->calculator->multiply(2, 3));
    }

    public function test_divide(): void
    {
        $this->assertEquals(2.0, $this->calculator->divide(6, 3));
    }

    public function test_divide_by_zero_throws(): void
    {
        $this->expectException(\DivisionByZeroError::class);
        $this->calculator->divide(6, 0);
    }
}
