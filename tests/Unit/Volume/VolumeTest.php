<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Volume;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Volume\CubicInch;
use MeasurementUnit\Volume\CubicMeter;
use MeasurementUnit\Volume\CubicYard;
use MeasurementUnit\Volume\FluidDram;
use MeasurementUnit\Volume\FluidOunce;
use MeasurementUnit\Volume\Liter;
use MeasurementUnit\Volume\Pint;
use MeasurementUnit\Volume\Quart;
use MeasurementUnit\Volume\TableSpoon;
use MeasurementUnit\Volume\Volume;
use MeasurementUnit\Volume\VolumeInterface;

/**
 * @coversDefaultClass \MeasurementUnit\Volume\Volume
 */
class VolumeTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testConstruct(): void
    {
        $volume = new class (42.0) extends Volume {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromCubicMeterValue(float $value): VolumeInterface
            {
                return new self($value);
            }

            public function toCubicMeterValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame(42.0, $volume->value);
    }

    /**
     * @covers ::toUnit
     * @covers ::toCubicInch
     * @covers ::toCubicMeter
     * @covers ::toCubicYard
     * @covers ::toFluidDram
     * @covers ::toFluidOunce
     * @covers ::toLiter
     * @covers ::toPint
     * @covers ::toQuart
     * @covers ::toTableSpoon
     */
    public function testToUnit(): void
    {
        $volume = new class (42.0) extends Volume {
            public static function getSymbol(): string
            {
                return '';
            }

            public static function fromCubicMeterValue(float $value): VolumeInterface
            {
                return new self($value);
            }

            public function toCubicMeterValue(): float
            {
                return 21.0;
            }
        };

        static::assertInstanceOf(CubicInch::class, $volume->toCubicInch());
        static::assertInstanceOf(CubicMeter::class, $volume->toCubicMeter());
        static::assertEqualsWithDelta(21.0, $volume->toCubicMeter()->getValue(), 0.000001);
        static::assertInstanceOf(CubicYard::class, $volume->toCubicYard());
        static::assertInstanceOf(FluidDram::class, $volume->toFluidDram());
        static::assertInstanceOf(FluidOunce::class, $volume->toFluidOunce());
        static::assertInstanceOf(Liter::class, $volume->toLiter());
        static::assertInstanceOf(Pint::class, $volume->toPint());
        static::assertInstanceOf(Quart::class, $volume->toQuart());
        static::assertInstanceOf(TableSpoon::class, $volume->toTableSpoon());
    }

    /**
     * @covers ::__toString
     */
    public function testToString(): void
    {
        $volume = new class (42.0) extends Volume {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromCubicMeterValue(float $value): VolumeInterface
            {
                return new self($value);
            }

            public function toCubicMeterValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame('42 unit', $volume->__toString());
    }
}
