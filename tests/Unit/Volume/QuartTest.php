<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Volume;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Volume\Quart;

/**
 * @coversDefaultClass \MeasurementUnit\Volume\Quart
 */
class QuartTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('qt', Quart::getSymbol());
    }

    /**
     * @covers ::fromCubicMeterValue
     */
    public function testFromCubicMeterValue(): void
    {
        $quart = Quart::fromCubicMeterValue(42.0);
        static::assertEqualsWithDelta(44380.9022637, $quart->getValue(), 0.01);
    }

    /**
     * @covers ::toCubicMeterValue
     */
    public function testToCubicMeterValue(): void
    {
        static::assertEqualsWithDelta(0.039746826, (new Quart(42.0))->toCubicMeterValue(), 0.000001);
    }
}
