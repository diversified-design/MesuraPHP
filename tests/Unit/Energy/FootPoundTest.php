<?php

declare(strict_types=1);

use Mesura\Energy\FootPound;

test(
    'symbol is ft⋅lbf',
    fn () => expect(FootPound::getSymbol())->toBe('ft⋅lbf')
);

test(
    'creates from joule value',
    fn () => expect(FootPound::fromJouleValue(1.3558179483314004)->getValue())->toEqualWithDelta(1.0, 0.000001)
);

test(
    'converts to joule value',
    fn () => expect((new FootPound(1.0))->toJouleValue())->toEqualWithDelta(1.3558179483314004, 0.000001)
);
