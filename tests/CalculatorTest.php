<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Calculator;
use InvalidArgumentException;

class CalculatorTest extends TestCase
{
    private Calculator $calculator;

    protected function setUp(): void
    {
        // Deze methode wordt vóór elke test uitgevoerd.
        // Hier maken we één keer een nieuwe Calculator aan
        // zodat elke test met een "schone" situatie begint.
        $this->calculator = new Calculator();
    }

    /* =========================
     * BASIC OPERATIONS
     * ========================= */

    public function testAdd()
    {
        // Arrange
        $a = 5;
        $b = 3;

        // Act
        $result = $this->calculator->add($a, $b);

        // Assert
        $this->assertEquals(8, $result);
    }

    public function testAddWithNegativeNumbers()
    {
        // Arrange
        $a = -5;
        $b = -3;

        // Act
        $result = $this->calculator->add($a, $b);

        // Assert
        $this->assertEquals(-8, $result);
    }

    public function testSubtract()
    {
        // Arrange
        $a = 10;
        $b = 4;

        // Act
        $result = $this->calculator->subtract($a, $b);

        // Assert
        $this->assertEquals(6, $result);
    }

    public function testMultiply()
    {
        // Arrange
        $a = 6;
        $b = 7;

        // Act
        $result = $this->calculator->multiply($a, $b);

        // Assert
        $this->assertEquals(42, $result);
    }

    public function testMultiplyByZero()
    {
        // Arrange
        $a = 100;
        $b = 0;

        // Act
        $result = $this->calculator->multiply($a, $b);

        // Assert
        $this->assertEquals(0, $result);
    }

    public function testDivide()
    {
        // Arrange
        $a = 20;
        $b = 4;

        // Act
        $result = $this->calculator->divide($a, $b);

        // Assert
        $this->assertEquals(5, $result);
    }

    public function testDivideByZeroThrowsException()
    {
        // Arrange
        $a = 10;
        $b = 0;

        // Assert - verwachten we een exception?
        $this->expectException(InvalidArgumentException::class);

        // Act
        $this->calculator->divide($a, $b);
    }

    /* =========================
     * POWER
     * ========================= */

    public function testPower()
    {
        // Arrange
        $base = 2;
        $exponent = 3;

        // Act
        $result = $this->calculator->power($base, $exponent);

        // Assert
        $this->assertEquals(8, $result);
    }

    public function testPowerWithExponentZero()
    {
        // Arrange
        $base = 5;
        $exponent = 0;

        // Act
        $result = $this->calculator->power($base, $exponent);

        // Assert
        $this->assertEquals(1, $result);
    }

    /* =========================
     * PERCENTAGE
     * ========================= */

    public function testPercentage()
    {
        // Arrange
        $total = 200;
        $percentage = 10;

        // Act
        $result = $this->calculator->percentage($total, $percentage);

        // Assert
        $this->assertEquals(20, $result);
    }

    public function testPercentageZero()
    {
        // Arrange
        $total = 200;
        $percentage = 0;

        // Act
        $result = $this->calculator->percentage($total, $percentage);

        // Assert
        $this->assertEquals(0, $result);
    }

    public function testPercentageAboveOneHundred()
    {
        // Arrange
        $total = 200;
        $percentage = 150;

        // Act
        $result = $this->calculator->percentage($total, $percentage);

        // Assert
        $this->assertEquals(300, $result);
    }

    /* =========================
     * AVERAGE
     * ========================= */

    public function testAverageOfTwoNumbers()
    {
        // Arrange
        $numbers = [10, 20];

        // Act
        $result = $this->calculator->average($numbers);

        // Assert
        $this->assertEquals(15, $result);
    }

    public function testAverageOfMultipleNumbers()
    {
        // Arrange
        $numbers = [10, 20, 30, 40, 50];

        // Act
        $result = $this->calculator->average($numbers);

        // Assert
        $this->assertEquals(30, $result);
    }

    public function testAverageEmptyArrayThrowsException()
    {
        // Arrange
        $numbers = [];

        // Assert - verwachten we een exception?
        $this->expectException(InvalidArgumentException::class);

        // Act
        $this->calculator->average($numbers);
    }

    /* =========================
     * HIGHEST
     * ========================= */

    public function testHighest()
    {
        // Arrange
        $numbers = [5, 15, 3, 20, 8];

        // Act
        $result = $this->calculator->highest($numbers);

        // Assert
        $this->assertEquals(20, $result);
    }

    public function testHighestWithNegativeNumbers()
    {
        // Arrange
        $numbers = [-5, -15, -3, -20, -8];

        // Act
        $result = $this->calculator->highest($numbers);

        // Assert
        $this->assertEquals(-3, $result);
    }

    /* =========================
     * LOWEST
     * ========================= */

    public function testLowest()
    {
        // Arrange
        $numbers = [5, 15, 3, 20, 8];

        // Act
        $result = $this->calculator->lowest($numbers);

        // Assert   
        $this->assertEquals(3, $result);
    }

    public function testLowestWithDecimals()
    {
        // Arrange
        $numbers = [5.5, 15.2, 3.8, 20.1, 8.9];

        // Act
        $result = $this->calculator->lowest($numbers);

        // Assert
        $this->assertEquals(3.8, $result);
    }
}
