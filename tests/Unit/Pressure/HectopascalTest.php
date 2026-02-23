<?php

declare(strict_types=1);

use MeasurementUnit\Pressure\Hectopascal;

test(
    'symbol is hPa',
    fn () => expect(Hectopascal::getSymbol())->toBe('hPa')
);

test(
    'creates from pascal value',
    fn () => expect(Hectopascal::fromPascalValue(42.0)->getValue())->toEqualWithDelta(0.42, 0.000001)
);

test(
    'converts to pascal value',
    fn () => expect((new Hectopascal(42.0))->toPascalValue())->toEqualWithDelta(4200.0, 0.000001)
);
