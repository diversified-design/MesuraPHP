<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Length;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Length\Yard;

/**
 * @coversDefaultClass \MeasurementUnit\Length\Yard
 */
class YardTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testgetSymbol(): void
    {
        static::assertSame('yd', Yard::getSymbol());
    }

    /**
     * @covers ::fromMeterValue
     */
    public function testFromMeterValue(): void
    {
        $yard = Yard::fromMeterValue(42.0);
        static::assertEqualsWithDelta(45.9317585302, $yard->getValue(), 0.000001);
    }

    /**
     * @covers ::toMeterValue
     */
    public function testToMeterValue(): void
    {
        static::assertEqualsWithDelta(38.4048, (new Yard(42.0))->toMeterValue(), 0.000001);
    }
}
