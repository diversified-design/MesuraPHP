<?php

declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Length;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Length\Meter;

/**
 * @coversDefaultClass \MeasurementUnit\Length\Meter
 */
class MeterTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testgetSymbol(): void
    {
        static::assertSame('m', Meter::getSymbol());
    }

    /**
     * @covers ::fromMeterValue
     */
    public function testFromMeterValue(): void
    {
        $meter = Meter::fromMeterValue(42.0);
        static::assertEqualsWithDelta(42.0, $meter->getValue(), 0.000001);
    }

    /**
     * @covers ::toMeterValue
     */
    public function testToMeterValue(): void
    {
        static::assertSame(42.0, (new Meter(42.0))->toMeterValue());
    }
}
