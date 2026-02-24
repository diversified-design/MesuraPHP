<?php

declare(strict_types=1);

use Mesura\Volume\Quart;

test(
    'symbol is qt',
    fn () => expect(Quart::getSymbol())->toBe('qt')
);

test(
    'creates from cubic meter value',
    fn () => expect(Quart::fromCubicMeterValue(42.0)->getValue())->toEqualWithDelta(44380.9022637, 0.01)
);

test(
    'converts to cubic meter value',
    fn () => expect((new Quart(42.0))->toCubicMeterValue())->toEqualWithDelta(0.039746826, 0.000001)
);
