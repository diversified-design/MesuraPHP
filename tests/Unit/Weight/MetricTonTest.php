<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Weight;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Weight\MetricTon;

/**
 * @coversDefaultClass \MeasurementUnit\Weight\MetricTon
 */
class MetricTonTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('t', MetricTon::getSymbol());
    }

    /**
     * @covers ::fromKilogramValue
     */
    public function testFromMeterPerSecondValue(): void
    {
        $metricTon = MetricTon::fromKilogramValue(42.0);
        static::assertEqualsWithDelta(0.042, $metricTon->getValue(), 0.000001);
    }

    /**
     * @covers ::toKilogramValue
     */
    public function testToMeterPerSecondValue(): void
    {
        static::assertEqualsWithDelta(42000.0, (new MetricTon(42.0))->toKilogramValue(), 0.000001);
    }
}
