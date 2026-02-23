<?php

declare(strict_types=1);

use MeasurementUnit\Temperature\Celsius;

test(
    'symbol is °C',
    fn () => expect(Celsius::getSymbol())->toBe('°C')
);

test(
    'creates from kelvin value',
    fn () => expect(Celsius::fromKelvinValue(42.0)->getValue())->toEqualWithDelta(-231.15, 0.000001)
);

test(
    'converts to kelvin value',
    fn () => expect((new Celsius(42.0))->toKelvinValue())->toEqualWithDelta(315.15, 0.000001)
);
