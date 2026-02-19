<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Speed;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Speed\MilesPerHour;

/**
 * @coversDefaultClass \MeasurementUnit\Speed\MilesPerHour
 */
class MilesPerHourTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('mph', MilesPerHour::getSymbol());
    }

    /**
     * @covers ::fromMeterPerSecondValue
     */
    public function testFromMeterPerSecondValue(): void
    {
        $mph = MilesPerHour::fromMeterPerSecondValue(42.0);
        static::assertEqualsWithDelta(93.9513242663, $mph->getValue(), 0.000001);
    }

    /**
     * @covers ::toMeterPerSecondValue
     */
    public function testToMeterPerSecondValue(): void
    {
        static::assertEqualsWithDelta(18.77568, (new MilesPerHour(42.0))->toMeterPerSecondValue(), 0.000001);
    }
}
