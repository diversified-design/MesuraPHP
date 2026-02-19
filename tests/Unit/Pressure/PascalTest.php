<?php

declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Pressure;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Pressure\Pascal;

/**
 * @coversDefaultClass \MeasurementUnit\Pressure\Pascal
 */
class PascalTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('Pa', Pascal::getSymbol());
    }

    /**
     * @covers ::fromPascalValue
     */
    public function testFromPascalValue(): void
    {
        $pascal = Pascal::fromPascalValue(42.0);
        static::assertEqualsWithDelta(42.0, $pascal->getValue(), 0.000001);
    }

    /**
     * @covers ::toPascalValue
     */
    public function testToPascalValue(): void
    {
        static::assertSame(42.0, (new Pascal(42.0))->toPascalValue());
    }
}
