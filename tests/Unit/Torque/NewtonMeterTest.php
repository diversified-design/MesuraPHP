<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Torque;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Torque\NewtonMeter;

/**
 * @coversDefaultClass \MeasurementUnit\Torque\NewtonMeter
 */
class NewtonMeterTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('N⋅m', NewtonMeter::getSymbol());
    }

    /**
     * @covers ::fromNewtonMeterValue
     */
    public function testFromNewtonMeter(): void
    {
        $newtonMeter = NewtonMeter::fromNewtonMeterValue(42.0);
        static::assertEqualsWithDelta(42.0, $newtonMeter->getValue(), 0.000001);
    }

    /**
     * @covers ::toNewtonMeterValue
     */
    public function testToNewtonMeter(): void
    {
        static::assertSame(42.0, (new NewtonMeter(42.0))->toNewtonMeterValue());
    }
}
