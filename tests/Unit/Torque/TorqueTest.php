<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Torque;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Torque\NewtonMeter;
use MeasurementUnit\Torque\Torque;
use MeasurementUnit\Torque\TorqueInterface;

/**
 * @coversDefaultClass \MeasurementUnit\Torque\Torque
 */
class TorqueTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testConstruct(): void
    {
        $torque = new class (42.0) extends Torque {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromNewtonMeterValue(float $value): TorqueInterface
            {
                return new self($value);
            }

            public function toNewtonMeterValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame(42.0, $torque->value);
    }

    /**
     * @covers ::toUnit
     * @covers ::toNewtonMeter
     */
    public function testToUnit(): void
    {
        $torque = new class (42.0) extends Torque {
            public static function getSymbol(): string
            {
                return '';
            }

            public static function fromNewtonMeterValue(float $value): TorqueInterface
            {
                return new self($value);
            }

            public function toNewtonMeterValue(): float
            {
                return 21.0;
            }
        };

        static::assertInstanceOf(NewtonMeter::class, $torque->toNewtonMeter());
        static::assertEqualsWithDelta(21.0, $torque->toNewtonMeter()->getValue(), 0.000001);
    }

    /**
     * @covers ::__toString
     */
    public function testToString(): void
    {
        $torque = new class (42.0) extends Torque {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromNewtonMeterValue(float $value): TorqueInterface
            {
                return new self($value);
            }

            public function toNewtonMeterValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame('42 unit', $torque->__toString());
    }
}
