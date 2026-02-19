<?php

declare(strict_types=1);

use MeasurementUnit\Percentage\Percent;

test('symbol is %', fn () =>
    expect(Percent::getSymbol())->toBe('%')
);

test('getValue returns construction value', fn () =>
    expect((new Percent(42.0))->getValue())->toBe(42.0)
);

test('toDecimal converts to decimal', fn () =>
    expect((new Percent(42.0))->toDecimal())->toEqualWithDelta(0.42, 0.000001)
);

test('toCoefficient converts to coefficient', fn () =>
    expect((new Percent(42.0))->toCoefficient())->toEqualWithDelta(1.42, 0.000001)
);
