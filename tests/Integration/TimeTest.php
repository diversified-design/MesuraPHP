<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Integration;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Time\Day;
use MeasurementUnit\Time\Hour;
use MeasurementUnit\Time\Minute;
use MeasurementUnit\Time\Second;
use MeasurementUnit\Time\Time;

/** @coversNothing */
class TimeTest extends TestCase
{
    /** @var array<class-string<Time>> */
    private const TIME_FQN_S = [
        Day::class,
        Hour::class,
        Minute::class,
        Second::class,
    ];

    /** @dataProvider timeInstances */
    public function testReversibility(Time $time): void
    {
        static::assertEqualsWithDelta($time, $time::fromSecondValue($time->toSecondValue()), 0.000001);
    }

    /** @return iterable<class-string<Time>, array<Time>> */
    public function timeInstances(): iterable
    {
        foreach (self::TIME_FQN_S as $timeFQN) {
            yield $timeFQN => [new $timeFQN(42.0)];
        }
    }

    public function testCorrectConversionRate(): void
    {
        static::assertEqualsWithDelta(new Second(3628800), (new Day(42.0))->toSecond(), 0.000001);
        static::assertEqualsWithDelta(new Second(151200), (new Hour(42.0))->toSecond(), 0.000001);
        static::assertEqualsWithDelta(new Second(2520), (new Minute(42.0))->toSecond(), 0.000001);
        static::assertEqualsWithDelta(new Second(42.0), (new Second(42.0))->toSecond(), 0.000001);
    }
}
