<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Length;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Length\Centimeter;

/**
 * @coversDefaultClass \MeasurementUnit\Length\Centimeter
 */
class CentimeterTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testgetSymbol(): void
    {
        static::assertSame('cm', Centimeter::getSymbol());
    }

    /**
     * @covers ::fromMeterValue
     */
    public function testFromMeterValue(): void
    {
        $centimeter = Centimeter::fromMeterValue(42.0);
        static::assertEqualsWithDelta(4200.0, $centimeter->getValue(), 0.000001);
    }

    /**
     * @covers ::toMeterValue
     */
    public function testToMeterValue(): void
    {
        static::assertEqualsWithDelta(0.42, (new Centimeter(42.0))->toMeterValue(), 0.000001);
    }
}
