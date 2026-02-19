<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Length;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Length\Foot;

/**
 * @coversDefaultClass \MeasurementUnit\Length\Foot
 */
class FootTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testgetSymbol(): void
    {
        static::assertSame('ft', Foot::getSymbol());
    }

    /**
     * @covers ::fromMeterValue
     */
    public function testFromMeterValue(): void
    {
        $foot = Foot::fromMeterValue(42.0);
        static::assertEqualsWithDelta(137.795275591, $foot->getValue(), 0.000001);
    }

    /**
     * @covers ::toMeterValue
     */
    public function testToMeterValue(): void
    {
        static::assertEqualsWithDelta(12.8016, (new Foot(42.0))->toMeterValue(), 0.000001);
    }
}
