<?php

declare(strict_types=1);

use Mesura\Temperature\Fahrenheit;

test(
    'symbol is °F',
    fn () => expect(Fahrenheit::getSymbol())->toBe('°F')
);

test(
    'creates from kelvin value',
    fn () => expect(Fahrenheit::fromKelvinValue(42.0)->getValue())->toEqualWithDelta(-384.07, 0.000001)
);

test(
    'converts to kelvin value',
    fn () => expect((new Fahrenheit(42.0))->toKelvinValue())->toEqualWithDelta(278.705555556, 0.000001)
);
