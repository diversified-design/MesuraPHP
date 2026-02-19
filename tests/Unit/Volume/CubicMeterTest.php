<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Volume;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Volume\CubicMeter;

/**
 * @coversDefaultClass \MeasurementUnit\Volume\CubicMeter
 */
class CubicMeterTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('m³', CubicMeter::getSymbol());
    }

    /**
     * @covers ::fromCubicMeterValue
     */
    public function testFromCubicMeterValue(): void
    {
        $cubicMeter = CubicMeter::fromCubicMeterValue(42.0);
        static::assertEqualsWithDelta(42.0, $cubicMeter->getValue(), 0.000001);
    }

    /**
     * @covers ::toCubicMeterValue
     */
    public function testToCubicMeterValue(): void
    {
        static::assertSame(42.0, (new CubicMeter(42.0))->toCubicMeterValue());
    }
}
