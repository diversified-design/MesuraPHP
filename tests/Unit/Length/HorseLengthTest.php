<?php

declare(strict_types=1);

use MeasurementUnit\Length\HorseLength;

test('symbol is hl', fn () =>
    expect(HorseLength::getSymbol())->toBe('hl')
);

test('creates from meter value', fn () =>
    expect(HorseLength::fromMeterValue(42.0)->getValue())->toEqualWithDelta(17.5, 0.000001)
);

test('converts to meter value', fn () =>
    expect((new HorseLength(42.0))->toMeterValue())->toEqualWithDelta(100.8, 0.000001)
);
