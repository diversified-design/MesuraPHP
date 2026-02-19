<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Length;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Length\Furlong;

/**
 * @coversDefaultClass \MeasurementUnit\Length\Furlong
 */
class FurlongTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testgetSymbol(): void
    {
        static::assertSame('fur', Furlong::getSymbol());
    }

    /**
     * @covers ::fromMeterValue
     */
    public function testFromMeterValue(): void
    {
        $furlong = Furlong::fromMeterValue(42.0);
        static::assertEqualsWithDelta(0.20878072059, $furlong->getValue(), 0.000001);
    }

    /**
     * @covers ::toMeterValue
     */
    public function testToMeterValue(): void
    {
        static::assertEqualsWithDelta(8449.056, (new Furlong(42.0))->toMeterValue(), 0.000001);
    }
}
