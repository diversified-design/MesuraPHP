<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Weight;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Weight\Kilogram;

/**
 * @coversDefaultClass \MeasurementUnit\Weight\Kilogram
 */
class KilogramTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('kg', Kilogram::getSymbol());
    }

    /**
     * @covers ::fromKilogramValue
     */
    public function testFromMeterPerSecondValue(): void
    {
        $kilogram = Kilogram::fromKilogramValue(42.0);
        static::assertEqualsWithDelta(42.0, $kilogram->getValue(), 0.000001);
    }

    /**
     * @covers ::toKilogramValue
     */
    public function testToMeterPerSecondValue(): void
    {
        static::assertSame(42.0, (new Kilogram(42.0))->toKilogramValue());
    }
}
