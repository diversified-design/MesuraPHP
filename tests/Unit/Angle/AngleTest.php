<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Angle;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Angle\Degree;
use MeasurementUnit\Angle\Radian;
use MeasurementUnit\Angle\Angle;
use MeasurementUnit\Angle\AngleInterface;

/**
 * @coversDefaultClass \MeasurementUnit\Angle\Angle
 */
class AngleTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testConstruct(): void
    {
        $angle = new class (42.0) extends Angle {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromRadianValue(float $value): AngleInterface
            {
                return new self($value);
            }

            public function toRadianValue(): float
            {
                return 0.733038;
            }
        };

        static::assertSame(42.0, $angle->value);
    }

    /**
     * @covers ::toUnit
     * @covers ::toDegree
     * @covers ::toRadian
     */
    public function testToUnit(): void
    {
        $angle = new class (42.0) extends Angle {
            public static function getSymbol(): string
            {
                return '';
            }

            public static function fromRadianValue(float $value): AngleInterface
            {
                return new self($value);
            }

            public function toRadianValue(): float
            {
                return 21.0;
            }
        };

        static::assertInstanceOf(Degree::class, $angle->toDegree());
        static::assertInstanceOf(Radian::class, $angle->toRadian());
        static::assertEqualsWithDelta(21.0, $angle->toRadian()->getValue(), 0.000001);
    }

    /**
     * @covers ::__toString
     */
    public function testToString(): void
    {
        $angle = new class (42.0) extends Angle {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromRadianValue(float $value): AngleInterface
            {
                return new self($value);
            }

            public function toRadianValue(): float
            {
                return 0.733038;
            }
        };

        static::assertSame('42 unit', $angle->__toString());
    }
}
