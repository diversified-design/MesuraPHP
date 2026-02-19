<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Speed;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Speed\Knot;

/**
 * @coversDefaultClass \MeasurementUnit\Speed\Knot
 */
class KnotTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('kn', Knot::getSymbol());
    }

    /**
     * @covers ::fromMeterPerSecondValue
     */
    public function testFromMeterPerSecondValue(): void
    {
        $knot = Knot::fromMeterPerSecondValue(42.0);
        static::assertEqualsWithDelta(81.6415392151, $knot->getValue(), 0.000001);
    }

    /**
     * @covers ::toMeterPerSecondValue
     */
    public function testToMeterPerSecondValue(): void
    {
        static::assertEqualsWithDelta(21.606648, (new Knot(42.0))->toMeterPerSecondValue(), 0.000001);
    }
}
