<?php

declare(strict_types=1);

use Mesura\Irradiance\BtuPerHourPerSquareFoot;
use Mesura\Irradiance\KilowattPerSquareMeter;
use Mesura\Irradiance\WattPerSquareMeter;

dataset('irradiance units', function () {
    yield WattPerSquareMeter::class => [new WattPerSquareMeter(42.0)];
    yield KilowattPerSquareMeter::class => [new KilowattPerSquareMeter(42.0)];
    yield BtuPerHourPerSquareFoot::class => [new BtuPerHourPerSquareFoot(42.0)];
});

test('round-trips through watt per square meter value', function ($irr) {
    expect($irr::fromWattPerSquareMeterValue($irr->toWattPerSquareMeterValue()))
        ->toEqualWithDelta($irr, 0.000001)
    ;
})->with('irradiance units');

test('converts at correct rate', function () {
    // Solar constant ≈ 1361 W/m² = 1.361 kW/m²
    expect((new KilowattPerSquareMeter(1.361))->toWattPerSquareMeter())->toEqualWithDelta(new WattPerSquareMeter(1361.0), 0.000001);
    expect((new WattPerSquareMeter(1000.0))->toKilowattPerSquareMeter())->toEqualWithDelta(new KilowattPerSquareMeter(1.0), 0.000001);
    expect((new WattPerSquareMeter(1000.0))->toBtuPerHourPerSquareFoot())->toEqualWithDelta(new BtuPerHourPerSquareFoot(317.0), 1.0);
});
