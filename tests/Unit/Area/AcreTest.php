<?php

declare(strict_types=1);

use MeasurementUnit\Area\Acre;

test(
    'symbol is ac',
    fn () => expect(Acre::getSymbol())->toBe('ac')
);

test(
    'creates from square meter value',
    fn () => expect(Acre::fromSquareMeterValue(42.0)->getValue())->toEqualWithDelta(0.01037851, 0.000001)
);

test(
    'converts to square meter value',
    fn () => expect((new Acre(42.0))->toSquareMeterValue())->toEqualWithDelta(169967.969741, 0.01)
);
