<?php

declare(strict_types=1);

use Mesura\SpecificEnergy\CaloriePerGram;

test(
    'symbol is cal/g',
    fn () => expect(CaloriePerGram::getSymbol())->toBe('cal/g')
);

test(
    'creates from joule per kilogram value',
    fn () => expect(CaloriePerGram::fromJoulePerKilogramValue(4184.0)->getValue())->toEqualWithDelta(1.0, 0.000001)
);

test(
    'converts to joule per kilogram value',
    fn () => expect((new CaloriePerGram(1.0))->toJoulePerKilogramValue())->toEqualWithDelta(4184.0, 0.000001)
);
