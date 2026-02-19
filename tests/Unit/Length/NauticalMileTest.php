<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Length;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Length\NauticalMile;

/**
 * @coversDefaultClass \MeasurementUnit\Length\NauticalMile
 */
class NauticalMileTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testgetSymbol(): void
    {
        static::assertSame('nmi', NauticalMile::getSymbol());
    }

    /**
     * @covers ::fromMeterValue
     */
    public function testFromMeterValue(): void
    {
        $nauticalMile = NauticalMile::fromMeterValue(42.0);
        static::assertEqualsWithDelta(0.02267818574, $nauticalMile->getValue(), 0.000001);
    }

    /**
     * @covers ::toMeterValue
     */
    public function testToMeterValue(): void
    {
        static::assertEqualsWithDelta(77784.0, (new NauticalMile(42.0))->toMeterValue(), 0.000001);
    }
}
