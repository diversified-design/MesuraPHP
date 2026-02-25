<?php

declare(strict_types=1);

use Mesura\Volume\Centiliter;
use Mesura\Volume\CubicInch;
use Mesura\Volume\CubicMeter;
use Mesura\Volume\CubicYard;
use Mesura\Volume\Decaliter;
use Mesura\Volume\Deciliter;
use Mesura\Volume\FluidDram;
use Mesura\Volume\FluidOunce;
use Mesura\Volume\Hectoliter;
use Mesura\Volume\ImperialFluidDram;
use Mesura\Volume\ImperialFluidOunce;
use Mesura\Volume\ImperialPint;
use Mesura\Volume\ImperialQuart;
use Mesura\Volume\Kiloliter;
use Mesura\Volume\Liter;
use Mesura\Volume\Milliliter;
use Mesura\Volume\Pint;
use Mesura\Volume\Quart;
use Mesura\Volume\TableSpoon;

dataset('volume units', function () {
    yield Milliliter::class => [new Milliliter(42.0)];
    yield Centiliter::class => [new Centiliter(42.0)];
    yield Deciliter::class => [new Deciliter(42.0)];
    yield Decaliter::class => [new Decaliter(42.0)];
    yield Hectoliter::class => [new Hectoliter(42.0)];
    yield Kiloliter::class => [new Kiloliter(42.0)];
    yield CubicInch::class => [new CubicInch(42.0)];
    yield CubicMeter::class => [new CubicMeter(42.0)];
    yield CubicYard::class => [new CubicYard(42.0)];
    yield FluidDram::class => [new FluidDram(42.0)];
    yield FluidOunce::class => [new FluidOunce(42.0)];
    yield Liter::class => [new Liter(42.0)];
    yield Pint::class => [new Pint(42.0)];
    yield Quart::class => [new Quart(42.0)];
    yield TableSpoon::class => [new TableSpoon(42.0)];
    yield ImperialPint::class => [new ImperialPint(42.0)];
    yield ImperialQuart::class => [new ImperialQuart(42.0)];
    yield ImperialFluidOunce::class => [new ImperialFluidOunce(42.0)];
    yield ImperialFluidDram::class => [new ImperialFluidDram(42.0)];
});

test('round-trips through cubic meter value', function ($volume) {
    expect($volume::fromCubicMeterValue($volume->toCubicMeterValue()))
        ->toEqualWithDelta($volume, 0.000001)
    ;
})->with('volume units');

test('converts at correct rate', function () {
    expect((new CubicInch(42.0))->toCubicMeter())->toEqualWithDelta(new CubicMeter(0.0006882582), 0.000001);
    expect((new CubicMeter(42.0))->toCubicMeter())->toEqualWithDelta(new CubicMeter(42.0), 0.000001);
    expect((new CubicYard(42.0))->toCubicMeter())->toEqualWithDelta(new CubicMeter(32.1113099), 0.000001);
    expect((new FluidDram(42.0))->toCubicMeter())->toEqualWithDelta(new CubicMeter(0.000155261), 0.000001);
    expect((new FluidOunce(42.0))->toCubicMeter())->toEqualWithDelta(new CubicMeter(0.00124209), 0.000001);
    expect((new Liter(42.0))->toCubicMeter())->toEqualWithDelta(new CubicMeter(0.042), 0.000001);
    expect((new Pint(42.0))->toCubicMeter())->toEqualWithDelta(new CubicMeter(0.019873392), 0.000001);
    expect((new Quart(42.0))->toCubicMeter())->toEqualWithDelta(new CubicMeter(0.0397468), 0.000001);
    expect((new TableSpoon(42.0))->toCubicMeter())->toEqualWithDelta(new CubicMeter(0.000621044), 0.000001);
    expect((new ImperialPint(42.0))->toCubicMeter())->toEqualWithDelta(new CubicMeter(0.02386697), 0.000001);
    expect((new ImperialQuart(42.0))->toCubicMeter())->toEqualWithDelta(new CubicMeter(0.04773395), 0.000001);
    expect((new ImperialFluidOunce(42.0))->toCubicMeter())->toEqualWithDelta(new CubicMeter(0.001193349), 0.000001);
    expect((new ImperialFluidDram(42.0))->toCubicMeter())->toEqualWithDelta(new CubicMeter(0.000149169), 0.000001);
});
