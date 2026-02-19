<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Speed;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Speed\KilometerPerHour;
use MeasurementUnit\Speed\Knot;
use MeasurementUnit\Speed\MeterPerSecond;
use MeasurementUnit\Speed\MilesPerHour;
use MeasurementUnit\Speed\Speed;
use MeasurementUnit\Speed\SpeedInterface;

/**
 * @coversDefaultClass \MeasurementUnit\Speed\Speed
 */
class SpeedTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testConstruct(): void
    {
        $speed = new class (42.0) extends Speed {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromMeterPerSecondValue(float $value): SpeedInterface
            {
                return new self($value);
            }

            public function toMeterPerSecondValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame(42.0, $speed->value);
    }

    /**
     * @covers ::toUnit
     * @covers ::toKilometerPerHour
     * @covers ::toKnot
     * @covers ::toMeterPerSecond
     * @covers ::toMilesPerHour
     */
    public function testToUnit(): void
    {
        $speed = new class (42.0) extends Speed {
            public static function getSymbol(): string
            {
                return '';
            }

            public static function fromMeterPerSecondValue(float $value): SpeedInterface
            {
                return new self($value);
            }

            public function toMeterPerSecondValue(): float
            {
                return 21.0;
            }
        };

        static::assertInstanceOf(KilometerPerHour::class, $speed->toKilometerPerHour());
        static::assertInstanceOf(MeterPerSecond::class, $speed->toMeterPerSecond());
        static::assertEqualsWithDelta(21.0, $speed->toMeterPerSecond()->getValue(), 0.000001);
        static::assertInstanceOf(MilesPerHour::class, $speed->toMilesPerHour());
        static::assertInstanceOf(Knot::class, $speed->toKnot());
    }

    /**
     * @covers ::__toString
     */
    public function testToString(): void
    {
        $speed = new class (42.0) extends Speed {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromMeterPerSecondValue(float $value): SpeedInterface
            {
                return new self($value);
            }

            public function toMeterPerSecondValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame('42 unit', $speed->__toString());
    }
}
