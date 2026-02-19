<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Volume;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Volume\FluidDram;

/**
 * @coversDefaultClass \MeasurementUnit\Volume\FluidDram
 */
class FluidDramTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('fl dr', FluidDram::getSymbol());
    }

    /**
     * @covers ::fromCubicMeterValue
     */
    public function testFromCubicMeterValue(): void
    {
        $fluidDram = FluidDram::fromCubicMeterValue(42.0);
        static::assertEqualsWithDelta(11361511.6134, $fluidDram->getValue(), 1.0);
    }

    /**
     * @covers ::toCubicMeterValue
     */
    public function testToCubicMeterValue(): void
    {
        static::assertEqualsWithDelta(0.00015526103, (new FluidDram(42.0))->toCubicMeterValue(), 0.000001);
    }
}
