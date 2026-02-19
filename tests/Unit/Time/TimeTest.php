<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Time;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Time\Day;
use MeasurementUnit\Time\Hour;
use MeasurementUnit\Time\Minute;
use MeasurementUnit\Time\Second;
use MeasurementUnit\Time\Time;
use MeasurementUnit\Time\TimeInterface;

/**
 * @coversDefaultClass \MeasurementUnit\Time\Time
 */
class TimeTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testConstruct(): void
    {
        $time = new class (42.0) extends Time {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromSecondValue(float $value): TimeInterface
            {
                return new self($value);
            }

            public function toSecondValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame(42.0, $time->value);
    }

    /**
     * @covers ::toUnit
     * @covers ::toDay
     * @covers ::toHour
     * @covers ::toMinute
     * @covers ::toSecond
     */
    public function testToUnit(): void
    {
        $time = new class (42.0) extends Time {
            public static function getSymbol(): string
            {
                return '';
            }

            public static function fromSecondValue(float $value): TimeInterface
            {
                return new self($value);
            }

            public function toSecondValue(): float
            {
                return 21.0;
            }
        };

        static::assertInstanceOf(Day::class, $time->toDay());
        static::assertInstanceOf(Hour::class, $time->toHour());
        static::assertInstanceOf(Minute::class, $time->toMinute());
        static::assertInstanceOf(Second::class, $time->toSecond());
        static::assertEqualsWithDelta(21.0, $time->toSecond()->getValue(), 0.000001);
    }

    /**
     * @covers ::__toString
     */
    public function testToString(): void
    {
        $time = new class (42.0) extends Time {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromSecondValue(float $value): TimeInterface
            {
                return new self($value);
            }

            public function toSecondValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame('42 unit', $time->__toString());
    }
}
