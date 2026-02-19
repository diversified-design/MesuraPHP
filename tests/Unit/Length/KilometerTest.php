<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Length;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Length\Kilometer;

/**
 * @coversDefaultClass \MeasurementUnit\Length\Kilometer
 */
class KilometerTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testgetSymbol(): void
    {
        static::assertSame('km', Kilometer::getSymbol());
    }

    /**
     * @covers ::fromMeterValue
     */
    public function testFromMeterValue(): void
    {
        $kilometer = Kilometer::fromMeterValue(42.0);
        static::assertEqualsWithDelta(0.042, $kilometer->getValue(), 0.000001);
    }

    /**
     * @covers ::toMeterValue
     */
    public function testToMeterValue(): void
    {
        static::assertEqualsWithDelta(42000.0, (new Kilometer(42.0))->toMeterValue(), 0.000001);
    }
}
