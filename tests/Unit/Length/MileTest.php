<?php

declare(strict_types=1);

use Mesura\Length\StatuteMile;

test(
    'symbol is mi',
    fn () => expect(StatuteMile::getSymbol())->toBe('mi')
);

test(
    'creates from meter value',
    fn () => expect(StatuteMile::fromMeterValue(42.0)->getValue())->toEqualWithDelta(0.02609759007, 0.000001)
);

test(
    'converts to meter value',
    fn () => expect((new StatuteMile(42.0))->toMeterValue())->toEqualWithDelta(67592.448, 0.000001)
);
