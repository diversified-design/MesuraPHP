<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Length;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Length\StatuteMile;

/**
 * @coversDefaultClass \MeasurementUnit\Length\StatuteMile
 */
class MileTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testgetSymbol(): void
    {
        static::assertSame('mi', StatuteMile::getSymbol());
    }

    /**
     * @covers ::fromMeterValue
     */
    public function testFromMeterValue(): void
    {
        $mile = StatuteMile::fromMeterValue(42.0);
        static::assertEqualsWithDelta(0.02609759007, $mile->getValue(), 0.000001);
    }

    /**
     * @covers ::toMeterValue
     */
    public function testToMeterValue(): void
    {
        static::assertEqualsWithDelta(67592.448, (new StatuteMile(42.0))->toMeterValue(), 0.000001);
    }
}
