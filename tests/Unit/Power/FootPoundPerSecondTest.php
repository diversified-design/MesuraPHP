<?php

declare(strict_types=1);

use Mesura\Power\FootPoundPerSecond;

test(
    'symbol is ft⋅lbf/s',
    fn () => expect(FootPoundPerSecond::getSymbol())->toBe('ft⋅lbf/s')
);

test(
    'creates from watt value',
    fn () => expect(FootPoundPerSecond::fromWattValue(1.3558179483314004)->getValue())->toEqualWithDelta(1.0, 0.000001)
);

test(
    'converts to watt value',
    fn () => expect((new FootPoundPerSecond(1.0))->toWattValue())->toEqualWithDelta(1.3558179483314004, 0.000001)
);
