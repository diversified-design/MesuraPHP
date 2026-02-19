<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Pressure;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Pressure\Bar;
use MeasurementUnit\Pressure\Hectopascal;
use MeasurementUnit\Pressure\Kilopascal;
use MeasurementUnit\Pressure\Millibar;
use MeasurementUnit\Pressure\MillimetreOfMercury;
use MeasurementUnit\Pressure\Pascal;
use MeasurementUnit\Pressure\PoundPerSquareInch;
use MeasurementUnit\Pressure\Pressure;
use MeasurementUnit\Pressure\PressureInterface;
use MeasurementUnit\Pressure\StandardAtmosphere;
use MeasurementUnit\Pressure\Torr;

/**
 * @coversDefaultClass \MeasurementUnit\Pressure\Pressure
 */
class PressureTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testConstruct(): void
    {
        $pressure = new class (42.0) extends Pressure {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromPascalValue(float $value): PressureInterface
            {
                return new self($value);
            }

            public function toPascalValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame(42.0, $pressure->value);
    }

    /**
     * @covers ::toUnit
     * @covers ::toBar
     * @covers ::toHectopascal
     * @covers ::toKilopascal
     * @covers ::toMillibar
     * @covers ::toMillimetreOfMercury
     * @covers ::toPascal
     * @covers ::toPoundPerSquareInch
     * @covers ::toStandardAtmosphere
     * @covers ::toTorr
     */
    public function testToUnit(): void
    {
        $pressure = new class (42.0) extends Pressure {
            public static function getSymbol(): string
            {
                return '';
            }

            public static function fromPascalValue(float $value): PressureInterface
            {
                return new self($value);
            }

            public function toPascalValue(): float
            {
                return 21.0;
            }
        };

        static::assertInstanceOf(Bar::class, $pressure->toBar());
        static::assertInstanceOf(Hectopascal::class, $pressure->toHectopascal());
        static::assertInstanceOf(Kilopascal::class, $pressure->toKilopascal());
        static::assertInstanceOf(Millibar::class, $pressure->toMillibar());
        static::assertInstanceOf(MillimetreOfMercury::class, $pressure->toMillimetreOfMercury());
        static::assertInstanceOf(Pascal::class, $pressure->toPascal());
        static::assertEqualsWithDelta(21.0, $pressure->toPascal()->getValue(), 0.000001);
        static::assertInstanceOf(PoundPerSquareInch::class, $pressure->toPoundPerSquareInch());
        static::assertInstanceOf(StandardAtmosphere::class, $pressure->toStandardAtmosphere());
        static::assertInstanceOf(Torr::class, $pressure->toTorr());
    }

    /**
     * @covers ::__toString
     */
    public function testToString(): void
    {
        $pressure = new class (42.0) extends Pressure {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromPascalValue(float $value): PressureInterface
            {
                return new self($value);
            }

            public function toPascalValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame('42 unit', $pressure->__toString());
    }
}
