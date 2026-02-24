<?php

declare(strict_types=1);

use Mesura\Area\Hectare;

test(
    'symbol is ha',
    fn () => expect(Hectare::getSymbol())->toBe('ha')
);

test(
    'creates from square meter value',
    fn () => expect(Hectare::fromSquareMeterValue(42.0)->getValue())->toEqualWithDelta(0.0042, 0.000001)
);

test(
    'converts to square meter value',
    fn () => expect((new Hectare(42.0))->toSquareMeterValue())->toEqualWithDelta(420000.0, 0.000001)
);
