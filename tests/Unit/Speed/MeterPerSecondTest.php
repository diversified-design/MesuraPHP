<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Speed;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Speed\MeterPerSecond;

/**
 * @coversDefaultClass \MeasurementUnit\Speed\MeterPerSecond
 */
class MeterPerSecondTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('m/s', MeterPerSecond::getSymbol());
    }

    /**
     * @covers ::fromMeterPerSecondValue
     */
    public function testFromMeterPerSecondValue(): void
    {
        $mps = MeterPerSecond::fromMeterPerSecondValue(42.0);
        static::assertEqualsWithDelta(42.0, $mps->getValue(), 0.000001);
    }

    /**
     * @covers ::toMeterPerSecondValue
     */
    public function testToMeterPerSecondValue(): void
    {
        static::assertSame(42.0, (new MeterPerSecond(42.0))->toMeterPerSecondValue());
    }
}
