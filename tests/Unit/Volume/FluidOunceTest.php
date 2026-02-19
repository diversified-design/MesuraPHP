<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Volume;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Volume\FluidOunce;

/**
 * @coversDefaultClass \MeasurementUnit\Volume\FluidOunce
 */
class FluidOunceTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('fl oz', FluidOunce::getSymbol());
    }

    /**
     * @covers ::fromCubicMeterValue
     */
    public function testFromCubicMeterValue(): void
    {
        $fluidOunce = FluidOunce::fromCubicMeterValue(42.0);
        static::assertEqualsWithDelta(1420102.69157, $fluidOunce->getValue(), 1.0);
    }

    /**
     * @covers ::toCubicMeterValue
     */
    public function testToCubicMeterValue(): void
    {
        static::assertEqualsWithDelta(0.00124216369, (new FluidOunce(42.0))->toCubicMeterValue(), 0.000001);
    }
}
