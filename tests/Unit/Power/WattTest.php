<?php

declare(strict_types=1);

use Mesura\Power\Watt;

test(
    'symbol is W',
    fn () => expect(Watt::getSymbol())->toBe('W')
);

test(
    'creates from watt value',
    fn () => expect(Watt::fromWattValue(42.0)->getValue())->toBe(42.0)
);

test(
    'converts to watt value',
    fn () => expect((new Watt(42.0))->toWattValue())->toBe(42.0)
);
