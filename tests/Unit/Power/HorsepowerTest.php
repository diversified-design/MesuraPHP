<?php

declare(strict_types=1);

use Mesura\Power\Horsepower;

test(
    'symbol is hp',
    fn () => expect(Horsepower::getSymbol())->toBe('hp')
);

test(
    'creates from watt value',
    fn () => expect(Horsepower::fromWattValue(745.69987158227022)->getValue())->toEqualWithDelta(1.0, 0.000001)
);

test(
    'converts to watt value',
    fn () => expect((new Horsepower(1.0))->toWattValue())->toEqualWithDelta(745.69987158227022, 0.000001)
);
