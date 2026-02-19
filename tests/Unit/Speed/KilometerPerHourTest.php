<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Speed;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Speed\KilometerPerHour;

/**
 * @coversDefaultClass \MeasurementUnit\Speed\KilometerPerHour
 */
class KilometerPerHourTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('km/h', KilometerPerHour::getSymbol());
    }

    /**
     * @covers ::fromMeterPerSecondValue
     */
    public function testFromMeterPerSecondValue(): void
    {
        $kmh = KilometerPerHour::fromMeterPerSecondValue(42.0);
        static::assertEqualsWithDelta(151.19987904, $kmh->getValue(), 0.000001);
    }

    /**
     * @covers ::toMeterPerSecondValue
     */
    public function testToMeterPerSecondValue(): void
    {
        static::assertEqualsWithDelta(11.666676, (new KilometerPerHour(42.0))->toMeterPerSecondValue(), 0.000001);
    }
}
