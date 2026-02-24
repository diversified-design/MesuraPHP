<?php

declare(strict_types=1);

use Mesura\Length\Foot;

test(
    'symbol is ft',
    fn () => expect(Foot::getSymbol())->toBe('ft')
);

test(
    'creates from meter value',
    fn () => expect(Foot::fromMeterValue(42.0)->getValue())->toEqualWithDelta(137.795275591, 0.000001)
);

test(
    'converts to meter value',
    fn () => expect((new Foot(42.0))->toMeterValue())->toEqualWithDelta(12.8016, 0.000001)
);
