<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Temperature;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Temperature\Celsius;
use MeasurementUnit\Temperature\Fahrenheit;
use MeasurementUnit\Temperature\Kelvin;
use MeasurementUnit\Temperature\Rankine;
use MeasurementUnit\Temperature\Temperature;
use MeasurementUnit\Temperature\TemperatureInterface;

/**
 * @coversDefaultClass \MeasurementUnit\Temperature\Temperature
 */
class TemperatureTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testConstruct(): void
    {
        $temperature = new class (42.0) extends Temperature {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromKelvinValue(float $value): TemperatureInterface
            {
                return new self($value);
            }

            public function toKelvinValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame(42.0, $temperature->value);
    }

    /**
     * @covers ::toUnit
     * @covers ::toCelsius
     * @covers ::toFahrenheit
     * @covers ::toKelvin
     * @covers ::toRankine
     */
    public function testToUnit(): void
    {
        $temperature = new class (42.0) extends Temperature {
            public static function getSymbol(): string
            {
                return '';
            }

            public static function fromKelvinValue(float $value): TemperatureInterface
            {
                return new self($value);
            }

            public function toKelvinValue(): float
            {
                return 21.0;
            }
        };

        static::assertInstanceOf(Celsius::class, $temperature->toCelsius());
        static::assertInstanceOf(Fahrenheit::class, $temperature->toFahrenheit());
        static::assertInstanceOf(Kelvin::class, $temperature->toKelvin());
        static::assertEqualsWithDelta(21.0, $temperature->toKelvin()->getValue(), 0.000001);
        static::assertInstanceOf(Rankine::class, $temperature->toRankine());
    }

    /**
     * @covers ::__toString
     */
    public function testToString(): void
    {
        $temperature = new class (42.0) extends Temperature {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromKelvinValue(float $value): TemperatureInterface
            {
                return new self($value);
            }

            public function toKelvinValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame('42 unit', $temperature->__toString());
    }
}
