<?php

declare(strict_types=1);

use MeasurementUnit\Time\Day;
use MeasurementUnit\Time\Hour;
use MeasurementUnit\Time\Minute;
use MeasurementUnit\Time\Second;

dataset('time units', function () {
    yield Day::class    => [new Day(42.0)];
    yield Hour::class   => [new Hour(42.0)];
    yield Minute::class => [new Minute(42.0)];
    yield Second::class => [new Second(42.0)];
});

test('round-trips through second value', function ($time) {
    expect($time::fromSecondValue($time->toSecondValue()))
        ->toEqualWithDelta($time, 0.000001);
})->with('time units');

test('converts at correct rate', function () {
    expect((new Day(42.0))->toSecond())->toEqualWithDelta(new Second(3628800), 0.000001);
    expect((new Hour(42.0))->toSecond())->toEqualWithDelta(new Second(151200), 0.000001);
    expect((new Minute(42.0))->toSecond())->toEqualWithDelta(new Second(2520), 0.000001);
    expect((new Second(42.0))->toSecond())->toEqualWithDelta(new Second(42.0), 0.000001);
});
