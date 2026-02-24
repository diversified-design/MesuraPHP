<?php

declare(strict_types=1);

use MeasurementUnit\Area\SquareMeter;

test(
    'symbol is m²',
    fn () => expect(SquareMeter::getSymbol())->toBe('m²')
);

test(
    'creates from square meter value',
    fn () => expect(SquareMeter::fromSquareMeterValue(42.0)->getValue())->toEqualWithDelta(42.0, 0.000001)
);

test(
    'converts to square meter value',
    fn () => expect((new SquareMeter(42.0))->toSquareMeterValue())->toBe(42.0)
);
