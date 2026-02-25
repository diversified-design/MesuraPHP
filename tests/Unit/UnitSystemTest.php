<?php

declare(strict_types=1);

use Mesura\UnitSystem;

test('enum has exactly 7 cases', function () {
    expect(UnitSystem::cases())->toHaveCount(7);
});

test('enum cases are SI, Metric, Imperial, USCustomary, Nautical, Dimensionless, Other', function () {
    $names = array_map(fn (UnitSystem $case) => $case->name, UnitSystem::cases());

    expect($names)->toBe([
        'SI',
        'Metric',
        'Imperial',
        'USCustomary',
        'Nautical',
        'Dimensionless',
        'Other',
    ]);
});
