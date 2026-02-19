<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Length;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Length\Inch;

/**
 * @coversDefaultClass \MeasurementUnit\Length\Inch
 */
class InchTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testgetSymbol(): void
    {
        static::assertSame('in', Inch::getSymbol());
    }

    /**
     * @covers ::fromMeterValue
     */
    public function testFromMeterValue(): void
    {
        $inch = Inch::fromMeterValue(42.0);
        static::assertEqualsWithDelta(1653.54330709, $inch->getValue(), 0.000001);
    }

    /**
     * @covers ::toMeterValue
     */
    public function testToMeterValue(): void
    {
        static::assertEqualsWithDelta(1.0668, (new Inch(42.0))->toMeterValue(), 0.000001);
    }
}
