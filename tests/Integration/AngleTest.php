<?php

declare(strict_types=1);

use Mesura\Angle\Degree;
use Mesura\Angle\Radian;

dataset('angle units', function () {
    yield Radian::class => [new Radian(42.0)];
    yield Degree::class => [new Degree(42.0)];
});

test('round-trips through radian value', function ($angle) {
    expect($angle::fromRadianValue($angle->toRadianValue()))
        ->toEqualWithDelta($angle, 0.000001)
    ;
})->with('angle units');

test('converts at correct rate', function () {
    expect((new Radian(42.0))->toRadian())->toEqualWithDelta(new Radian(42.0), 0.000001);
    expect((new Degree(42.0))->toRadian())->toEqualWithDelta(new Radian(0.733038), 0.000001);
});
