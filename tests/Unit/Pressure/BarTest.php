<?php

declare(strict_types=1);

use MeasurementUnit\Pressure\Bar;

test(
    'symbol is bar',
    fn () => expect(Bar::getSymbol())->toBe('bar')
);

test(
    'creates from pascal value',
    fn () => expect(Bar::fromPascalValue(42.0)->getValue())->toEqualWithDelta(0.00042, 0.000001)
);

test(
    'converts to pascal value',
    fn () => expect((new Bar(42.0))->toPascalValue())->toEqualWithDelta(4200000.0, 0.000001)
);
