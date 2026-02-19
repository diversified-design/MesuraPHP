<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Length;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Length\Thou;

/**
 * @coversDefaultClass \MeasurementUnit\Length\Thou
 */
class ThouTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testgetSymbol(): void
    {
        static::assertSame('thou', Thou::getSymbol());
    }

    /**
     * @covers ::fromMeterValue
     */
    public function testFromMeterValue(): void
    {
        $thou = Thou::fromMeterValue(42.0);
        static::assertEqualsWithDelta(1653543.30709, $thou->getValue(), 0.01);
    }

    /**
     * @covers ::toMeterValue
     */
    public function testToMeterValue(): void
    {
        static::assertEqualsWithDelta(0.0010668, (new Thou(42.0))->toMeterValue(), 0.000001);
    }
}
