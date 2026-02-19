<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Weight;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Weight\Kilogram;
use MeasurementUnit\Weight\MetricTon;
use MeasurementUnit\Weight\Pound;
use MeasurementUnit\Weight\Weight;
use MeasurementUnit\Weight\WeightInterface;

/**
 * @coversDefaultClass \MeasurementUnit\Weight\Weight
 */
class WeightTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testConstruct(): void
    {
        $weight = new class (42.0) extends Weight {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromKilogramValue(float $value): WeightInterface
            {
                return new self($value);
            }

            public function toKilogramValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame(42.0, $weight->value);
    }

    /**
     * @covers ::toUnit
     * @covers ::toKilogram
     * @covers ::toMetricTon
     * @covers ::toPound
     */
    public function testToUnit(): void
    {
        $weight = new class (42.0) extends Weight {
            public static function getSymbol(): string
            {
                return '';
            }

            public static function fromKilogramValue(float $value): WeightInterface
            {
                return new self($value);
            }

            public function toKilogramValue(): float
            {
                return 21.0;
            }
        };

        static::assertInstanceOf(Kilogram::class, $weight->toKilogram());
        static::assertEqualsWithDelta(21.0, $weight->toKilogram()->getValue(), 0.000001);
        static::assertInstanceOf(MetricTon::class, $weight->toMetricTon());
        static::assertInstanceOf(Pound::class, $weight->toPound());
    }

    /**
     * @covers ::__toString
     */
    public function testToString(): void
    {
        $weight = new class (42.0) extends Weight {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromKilogramValue(float $value): WeightInterface
            {
                return new self($value);
            }

            public function toKilogramValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame('42 unit', $weight->__toString());
    }
}
