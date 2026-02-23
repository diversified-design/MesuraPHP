<?php

declare(strict_types=1);

use MeasurementUnit\Length\Thou;

test(
    'symbol is thou',
    fn () => expect(Thou::getSymbol())->toBe('thou')
);

test(
    'creates from meter value',
    fn () => expect(Thou::fromMeterValue(42.0)->getValue())->toEqualWithDelta(1653543.30709, 0.01)
);

test(
    'converts to meter value',
    fn () => expect((new Thou(42.0))->toMeterValue())->toEqualWithDelta(0.0010668, 0.000001)
);
