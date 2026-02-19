<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Volume;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Volume\CubicInch;

/**
 * @coversDefaultClass \MeasurementUnit\Volume\CubicInch
 */
class CubicInchTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('in³', CubicInch::getSymbol());
    }

    /**
     * @covers ::fromCubicMeterValue
     */
    public function testFromCubicMeterValue(): void
    {
        $cubicInch = CubicInch::fromCubicMeterValue(42.0);
        static::assertEqualsWithDelta(2562991.62146, $cubicInch->getValue(), 0.01);
    }

    /**
     * @covers ::toCubicMeterValue
     */
    public function testToCubicMeterValue(): void
    {
        static::assertEqualsWithDelta(0.0006882582, (new CubicInch(42.0))->toCubicMeterValue(), 0.000001);
    }
}
