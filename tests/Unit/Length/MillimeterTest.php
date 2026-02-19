<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Length;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Length\Millimeter;

/**
 * @coversDefaultClass \MeasurementUnit\Length\Millimeter
 */
class MillimeterTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testgetSymbol(): void
    {
        static::assertSame('mm', Millimeter::getSymbol());
    }

    /**
     * @covers ::fromMeterValue
     */
    public function testFromMeterValue(): void
    {
        $millimeter = Millimeter::fromMeterValue(42.0);
        static::assertEqualsWithDelta(42000.0, $millimeter->getValue(), 0.000001);
    }

    /**
     * @covers ::toMeterValue
     */
    public function testToMeterValue(): void
    {
        static::assertEqualsWithDelta(0.042, (new Millimeter(42.0))->toMeterValue(), 0.000001);
    }
}
