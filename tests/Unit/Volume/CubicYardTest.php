<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Volume;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Volume\CubicYard;

/**
 * @coversDefaultClass \MeasurementUnit\Volume\CubicYard
 */
class CubicYardTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('yd³', CubicYard::getSymbol());
    }

    /**
     * @covers ::fromCubicMeterValue
     */
    public function testFromCubicMeterValue(): void
    {
        $cubicYard = CubicYard::fromCubicMeterValue(42.0);
        static::assertEqualsWithDelta(54.9339158072, $cubicYard->getValue(), 0.000001);
    }

    /**
     * @covers ::toCubicMeterValue
     */
    public function testToCubicMeterValue(): void
    {
        static::assertEqualsWithDelta(32.11131, (new CubicYard(42.0))->toCubicMeterValue(), 0.000001);
    }
}
