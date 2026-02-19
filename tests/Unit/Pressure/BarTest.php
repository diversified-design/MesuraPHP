<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Pressure;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Pressure\Bar;

/**
 * @coversDefaultClass \MeasurementUnit\Pressure\Bar
 */
class BarTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('bar', Bar::getSymbol());
    }

    /**
     * @covers ::fromPascalValue
     */
    public function testFromPascalValue(): void
    {
        $bar = Bar::fromPascalValue(42.0);
        static::assertEqualsWithDelta(0.00042, $bar->getValue(), 0.000001);
    }

    /**
     * @covers ::toPascalValue
     */
    public function testToPascalValue(): void
    {
        static::assertEqualsWithDelta(4200000.0, (new Bar(42.0))->toPascalValue(), 0.000001);
    }
}
