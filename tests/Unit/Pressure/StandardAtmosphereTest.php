<?php

declare(strict_types=1);

use MeasurementUnit\Pressure\StandardAtmosphere;

test(
    'symbol is atm',
    fn () => expect(StandardAtmosphere::getSymbol())->toBe('atm')
);

test(
    'creates from pascal value',
    fn () => expect(StandardAtmosphere::fromPascalValue(42.0)->getValue())->toEqualWithDelta(0.000414506, 0.000001)
);

test(
    'converts to pascal value',
    fn () => expect((new StandardAtmosphere(42.0))->toPascalValue())->toEqualWithDelta(4255650.0, 0.000001)
);
