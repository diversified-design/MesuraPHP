<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Volume;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Volume\Liter;

/**
 * @coversDefaultClass \MeasurementUnit\Volume\Liter
 */
class LiterTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('l', Liter::getSymbol());
    }

    /**
     * @covers ::fromCubicMeterValue
     */
    public function testFromCubicMeterValue(): void
    {
        $liter = Liter::fromCubicMeterValue(42.0);
        static::assertEqualsWithDelta(42000.0, $liter->getValue(), 0.000001);
    }

    /**
     * @covers ::toCubicMeterValue
     */
    public function testToCubicMeterValue(): void
    {
        static::assertEqualsWithDelta(0.042, (new Liter(42.0))->toCubicMeterValue(), 0.000001);
    }
}
