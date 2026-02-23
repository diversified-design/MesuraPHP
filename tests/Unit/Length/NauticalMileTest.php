<?php

declare(strict_types=1);

use MeasurementUnit\Length\NauticalMile;

test(
    'symbol is nmi',
    fn () => expect(NauticalMile::getSymbol())->toBe('nmi')
);

test(
    'creates from meter value',
    fn () => expect(NauticalMile::fromMeterValue(42.0)->getValue())->toEqualWithDelta(0.02267818574, 0.000001)
);

test(
    'converts to meter value',
    fn () => expect((new NauticalMile(42.0))->toMeterValue())->toEqualWithDelta(77784.0, 0.000001)
);
