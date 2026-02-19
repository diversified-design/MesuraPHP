<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Length;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Length\Centimeter;
use MeasurementUnit\Length\Fathom;
use MeasurementUnit\Length\Foot;
use MeasurementUnit\Length\Furlong;
use MeasurementUnit\Length\HorseLength;
use MeasurementUnit\Length\Inch;
use MeasurementUnit\Length\Kilometer;
use MeasurementUnit\Length\Length;
use MeasurementUnit\Length\LengthInterface;
use MeasurementUnit\Length\Meter;
use MeasurementUnit\Length\Millimeter;
use MeasurementUnit\Length\StatuteMile;
use MeasurementUnit\Length\NauticalMile;
use MeasurementUnit\Length\SurveyMile;
use MeasurementUnit\Length\Thou;
use MeasurementUnit\Length\Yard;

/**
 * @coversDefaultClass \MeasurementUnit\Length\Length
 */
class LengthTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testConstruct(): void
    {
        $length = new class (42.0) extends Length {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromMeterValue(float $value): LengthInterface
            {
                return new self($value);
            }

            public function toMeterValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame(42.0, $length->value);
    }

    /**
     * @covers ::toUnit
     * @covers ::toFathom
     * @covers ::toFoot
     * @covers ::toFurlong
     * @covers ::toHorseLength
     * @covers ::toInch
     * @covers ::toMeter
     * @covers ::toStatuteMile
     * @covers ::toNauticalMile
     * @covers ::toSurveyMile
     * @covers ::toThou
     * @covers ::toYard
     * @covers ::toKilometer
     */
    public function testToUnit(): void
    {
        $length = new class (42.0) extends Length {
            public static function getSymbol(): string
            {
                return '';
            }

            public static function fromMeterValue(float $value): LengthInterface
            {
                return new self($value);
            }

            public function toMeterValue(): float
            {
                return 21.0;
            }
        };

        static::assertInstanceOf(Fathom::class, $length->toFathom());
        static::assertInstanceOf(Foot::class, $length->toFoot());
        static::assertInstanceOf(Furlong::class, $length->toFurlong());
        static::assertInstanceOf(HorseLength::class, $length->toHorseLength());
        static::assertInstanceOf(Inch::class, $length->toInch());
        static::assertInstanceOf(Meter::class, $length->toMeter());
        static::assertEqualsWithDelta(21.0, $length->toMeter()->getValue(), 0.000001);
        static::assertInstanceOf(StatuteMile::class, $length->toStatuteMile());
        static::assertInstanceOf(NauticalMile::class, $length->toNauticalMile());
        static::assertInstanceOf(SurveyMile::class, $length->toSurveyMile());
        static::assertInstanceOf(Thou::class, $length->toThou());
        static::assertInstanceOf(Yard::class, $length->toYard());
        static::assertInstanceOf(Kilometer::class, $length->toKilometer());
    }

    /**
     * @covers ::__toString
     */
    public function testToString(): void
    {
        $length = new class (42.0) extends Length {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromMeterValue(float $value): LengthInterface
            {
                return new self($value);
            }

            public function toMeterValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame('42 unit', $length->__toString());
    }
}
