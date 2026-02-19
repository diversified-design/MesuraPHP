<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Pressure;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Pressure\Millibar;

/**
 * @coversDefaultClass \MeasurementUnit\Pressure\Millibar
 */
class MillibarTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('mbar', Millibar::getSymbol());
    }

    /**
     * @covers ::fromPascalValue
     */
    public function testFromPascalValue(): void
    {
        $millibar = Millibar::fromPascalValue(42.0);
        static::assertEqualsWithDelta(0.42, $millibar->getValue(), 0.000001);
    }

    /**
     * @covers ::toPascalValue
     */
    public function testToPascalValue(): void
    {
        static::assertEqualsWithDelta(4200.0, (new Millibar(42.0))->toPascalValue(), 0.000001);
    }
}
