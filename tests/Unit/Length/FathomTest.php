<?php

declare(strict_types=1);

use Mesura\Length\Fathom;

test(
    'symbol is ftm',
    fn () => expect(Fathom::getSymbol())->toBe('ftm')
);

test(
    'creates from meter value',
    fn () => expect(Fathom::fromMeterValue(42.0)->getValue())->toEqualWithDelta(22.9658792651, 0.000001)
);

test(
    'converts to meter value',
    fn () => expect((new Fathom(42.0))->toMeterValue())->toEqualWithDelta(76.8096, 0.000001)
);
