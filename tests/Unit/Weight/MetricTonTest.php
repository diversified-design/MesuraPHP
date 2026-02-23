<?php

declare(strict_types=1);

use MeasurementUnit\Weight\MetricTon;

test(
    'symbol is t',
    fn () => expect(MetricTon::getSymbol())->toBe('t')
);

test(
    'creates from kilogram value',
    fn () => expect(MetricTon::fromKilogramValue(42.0)->getValue())->toEqualWithDelta(0.042, 0.000001)
);

test(
    'converts to kilogram value',
    fn () => expect((new MetricTon(42.0))->toKilogramValue())->toEqualWithDelta(42000.0, 0.000001)
);
