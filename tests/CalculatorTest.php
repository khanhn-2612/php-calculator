<?php

namespace KhanhN\Calculator\Tests;

use KhanhN\Calculator\Calculator;
use KhanhN\Calculator\Chain;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    private Calculator $calculator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->calculator = new Calculator();
    }

    // ── Basic arithmetic ──────────────────────────────────────────────────────

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

    // ── Extra math ────────────────────────────────────────────────────────────

    public function test_power(): void
    {
        $this->assertEquals(8.0, $this->calculator->power(2, 3));
    }

    public function test_sqrt(): void
    {
        $this->assertEquals(4.0, $this->calculator->sqrt(16));
    }

    public function test_sqrt_negative_throws(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->calculator->sqrt(-1);
    }

    public function test_modulo(): void
    {
        $this->assertEquals(1.0, $this->calculator->modulo(10, 3));
    }

    public function test_modulo_by_zero_throws(): void
    {
        $this->expectException(\DivisionByZeroError::class);
        $this->calculator->modulo(10, 0);
    }

    public function test_abs(): void
    {
        $this->assertEquals(5.0, $this->calculator->abs(-5));
        $this->assertEquals(5.0, $this->calculator->abs(5));
    }

    public function test_percentage(): void
    {
        $this->assertEquals(30.0, $this->calculator->percentage(200, 15));
    }

    // ── Rounding ──────────────────────────────────────────────────────────────

    public function test_round(): void
    {
        $this->assertEquals(3.0, $this->calculator->round(3.4));
        $this->assertEquals(3.5, $this->calculator->round(3.45, 1));
    }

    public function test_floor(): void
    {
        $this->assertEquals(3.0, $this->calculator->floor(3.9));
    }

    public function test_ceil(): void
    {
        $this->assertEquals(4.0, $this->calculator->ceil(3.1));
    }

    // ── Fluent chain ──────────────────────────────────────────────────────────

    public function test_chain_returns_chain_instance(): void
    {
        $this->assertInstanceOf(Chain::class, Calculator::chain(10));
    }

    public function test_chain_basic_operations(): void
    {
        $result = Calculator::chain(100)
            ->add(50)
            ->subtract(20)
            ->multiply(2)
            ->divide(4)
            ->result();

        $this->assertEquals(65.0, $result);
    }

    public function test_chain_extra_math(): void
    {
        $this->assertEquals(8.0, Calculator::chain(2)->power(3)->result());
        $this->assertEquals(4.0, Calculator::chain(16)->sqrt()->result());
        $this->assertEquals(1.0, Calculator::chain(10)->modulo(3)->result());
        $this->assertEquals(5.0, Calculator::chain(-5)->abs()->result());
        $this->assertEquals(30.0, Calculator::chain(200)->percentage(15)->result());
    }

    public function test_chain_rounding(): void
    {
        $this->assertEquals(4.0, Calculator::chain(3.6)->round()->result());
        $this->assertEquals(3.0, Calculator::chain(3.9)->floor()->result());
        $this->assertEquals(4.0, Calculator::chain(3.1)->ceil()->result());
    }

    public function test_chain_divide_by_zero_throws(): void
    {
        $this->expectException(\DivisionByZeroError::class);
        Calculator::chain(10)->divide(0)->result();
    }
}
