<?php

declare(strict_types=1);

use MeasurementUnit\Temperature\Kelvin;

test(
    'symbol is K',
    fn () => expect(Kelvin::getSymbol())->toBe('K')
);

test(
    'creates from kelvin value',
    fn () => expect(Kelvin::fromKelvinValue(42.0)->getValue())->toEqualWithDelta(42.0, 0.000001)
);

test(
    'converts to kelvin value',
    fn () => expect((new Kelvin(42.0))->toKelvinValue())->toBe(42.0)
);
