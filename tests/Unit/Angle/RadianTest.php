<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Angle;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Angle\Radian;

/**
 * @coversDefaultClass \MeasurementUnit\Angle\Radian
 */
class RadianTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('rad', Radian::getSymbol());
    }

    /**
     * @covers ::fromRadianValue
     */
    public function testFromRadianValue(): void
    {
        $radian = Radian::fromRadianValue(42.0);
        static::assertEqualsWithDelta(42.0, $radian->getValue(), 0.000001);
    }

    /**
     * @covers ::toRadianValue
     */
    public function testToRadianValue(): void
    {
        static::assertSame(42.0, (new Radian(42.0))->toRadianValue());
    }
}
