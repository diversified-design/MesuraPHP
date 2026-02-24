<?php

declare(strict_types=1);

use MeasurementUnit\Area\SquareKilometer;

test(
    'symbol is km²',
    fn () => expect(SquareKilometer::getSymbol())->toBe('km²')
);

test(
    'creates from square meter value',
    fn () => expect(SquareKilometer::fromSquareMeterValue(42.0)->getValue())->toEqualWithDelta(0.000042, 0.000001)
);

test(
    'converts to square meter value',
    fn () => expect((new SquareKilometer(42.0))->toSquareMeterValue())->toEqualWithDelta(42000000.0, 0.000001)
);
