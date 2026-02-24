<?php

declare(strict_types=1);

use MeasurementUnit\Area\SquareMile;

test(
    'symbol is mi²',
    fn () => expect(SquareMile::getSymbol())->toBe('mi²')
);

test(
    'creates from square meter value',
    fn () => expect(SquareMile::fromSquareMeterValue(42.0)->getValue())->toEqualWithDelta(0.00001621148, 0.000001)
);

test(
    'converts to square meter value',
    fn () => expect((new SquareMile(42.0))->toSquareMeterValue())->toEqualWithDelta(108779500.634112, 0.01)
);
