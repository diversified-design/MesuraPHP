<?php

declare(strict_types=1);

use Mesura\Angle\Angle;
use Mesura\Angle\Degree;
use Mesura\Angle\Radian;
use Mesura\Area\Acre;
use Mesura\Area\Area;
use Mesura\Area\Hectare;
use Mesura\Area\SquareKilometer;
use Mesura\Area\SquareMillimeter;
use Mesura\Energy\BritishThermalUnit;
use Mesura\Energy\Energy;
use Mesura\Energy\Joule;
use Mesura\Energy\Kilojoule;
use Mesura\Energy\KilowattHour;
use Mesura\Length\Length;
use Mesura\Length\Meter;
use Mesura\Percentage\PartsPerMillion;
use Mesura\Percentage\Percent;
use Mesura\Percentage\Percentage;
use Mesura\Power\Kilowatt;
use Mesura\Power\Power;
use Mesura\Power\Watt;
use Mesura\Pressure\Bar;
use Mesura\Pressure\Pascal;
use Mesura\Pressure\PoundPerSquareInch;
use Mesura\Pressure\Pressure;
use Mesura\Resolver\UnitResolver;
use Mesura\Speed\Knot;
use Mesura\Speed\MeterPerSecond;
use Mesura\Speed\Speed;
use Mesura\Temperature\Temperature;
use Mesura\Time\Day;
use Mesura\Time\Hour;
use Mesura\Time\Second;
use Mesura\Time\Time;
use Mesura\Torque\NewtonMeter;
use Mesura\Torque\Torque;
use Mesura\Volume\CubicMeter;
use Mesura\Volume\Liter;
use Mesura\Volume\Milliliter;
use Mesura\Volume\Volume;
use Mesura\Weight\Gram;
use Mesura\Weight\Kilogram;
use Mesura\Weight\Pound;
use Mesura\Weight\Weight;

beforeEach(function () {
    UnitResolver::clearCache();
});

// --- All domains: resolve by default symbol ---

test('every domain resolves its units by default symbol', function (string $domainClass, string $unitClass) {
    $symbol = $unitClass::getDefaultSymbol();

    if ($symbol === '') {
        $this->markTestSkipped("Unit {$unitClass} has no default symbol");
    }

    $resolved = $domainClass::resolveUnitClass($symbol);
    // The resolved class should either be the unit itself, or (in case of symbol collision)
    // a class with the same default symbol
    expect($resolved::getDefaultSymbol())->toBe($symbol);
})->with(function () {
    $domains = [
        Angle::class,
        Area::class,
        Energy::class,
        Length::class,
        Percentage::class,
        Power::class,
        Pressure::class,
        Speed::class,
        Temperature::class,
        Time::class,
        Torque::class,
        Volume::class,
        Weight::class,
    ];

    foreach ($domains as $domainClass) {
        /** @var array<class-string, list<string>> $aliases */
        $aliases = (new ReflectionMethod($domainClass, 'unitAliases'))->invoke(null);

        foreach ($aliases as $unitClass => $names) {
            yield "{$domainClass} → {$unitClass}" => [$domainClass, $unitClass];
        }
    }
});

// --- Cross-domain spot checks ---

test('Angle resolves degree and radian', function () {
    expect(Angle::resolveUnitClass('degree'))->toBe(Degree::class);
    expect(Angle::resolveUnitClass('radian'))->toBe(Radian::class);
    expect(Angle::resolveUnitClass('rad'))->toBe(Radian::class);
});

test('Area resolves metric and non-metric', function () {
    expect(Area::resolveUnitClass('hectare'))->toBe(Hectare::class);
    expect(Area::resolveUnitClass('acre'))->toBe(Acre::class);
    expect(Area::resolveUnitClass('square kilometer'))->toBe(SquareKilometer::class);
    expect(Area::resolveUnitClass('square millimeter'))->toBe(SquareMillimeter::class);
});

test('Energy resolves joule variants and named units', function () {
    expect(Energy::resolveUnitClass('joule'))->toBe(Joule::class);
    expect(Energy::resolveUnitClass('kilojoule'))->toBe(Kilojoule::class);
    expect(Energy::resolveUnitClass('btu'))->toBe(BritishThermalUnit::class);
    expect(Energy::resolveUnitClass('kilowatt hour'))->toBe(KilowattHour::class);
});

test('Percentage resolves percent and ppm', function () {
    expect(Percentage::resolveUnitClass('percent'))->toBe(Percent::class);
    expect(Percentage::resolveUnitClass('ppm'))->toBe(PartsPerMillion::class);
});

test('Power resolves watt variants', function () {
    expect(Power::resolveUnitClass('watt'))->toBe(Watt::class);
    expect(Power::resolveUnitClass('kilowatt'))->toBe(Kilowatt::class);
});

test('Pressure resolves bar, pascal, psi', function () {
    expect(Pressure::resolveUnitClass('bar'))->toBe(Bar::class);
    expect(Pressure::resolveUnitClass('pascal'))->toBe(Pascal::class);
    expect(Pressure::resolveUnitClass('psi'))->toBe(PoundPerSquareInch::class);
});

test('Speed resolves common units', function () {
    expect(Speed::resolveUnitClass('knot'))->toBe(Knot::class);
    expect(Speed::resolveUnitClass('m/s'))->toBe(MeterPerSecond::class);
});

test('Time resolves all units', function () {
    expect(Time::resolveUnitClass('second'))->toBe(Second::class);
    expect(Time::resolveUnitClass('hour'))->toBe(Hour::class);
    expect(Time::resolveUnitClass('day'))->toBe(Day::class);
    expect(Time::resolveUnitClass('hr'))->toBe(Hour::class);
    expect(Time::resolveUnitClass('sec'))->toBe(Second::class);
});

test('Torque resolves newton meter', function () {
    expect(Torque::resolveUnitClass('newton meter'))->toBe(NewtonMeter::class);
    expect(Torque::resolveUnitClass('newton metre'))->toBe(NewtonMeter::class);
});

test('Volume resolves liters and metric variants', function () {
    expect(Volume::resolveUnitClass('liter'))->toBe(Liter::class);
    expect(Volume::resolveUnitClass('litre'))->toBe(Liter::class);
    expect(Volume::resolveUnitClass('milliliter'))->toBe(Milliliter::class);
    expect(Volume::resolveUnitClass('cubic meter'))->toBe(CubicMeter::class);
});

test('Weight resolves gram variants and pound', function () {
    expect(Weight::resolveUnitClass('gram'))->toBe(Gram::class);
    expect(Weight::resolveUnitClass('kilogram'))->toBe(Kilogram::class);
    expect(Weight::resolveUnitClass('kilogramme'))->toBe(Kilogram::class);
    expect(Weight::resolveUnitClass('pound'))->toBe(Pound::class);
    expect(Weight::resolveUnitClass('kg'))->toBe(Kilogram::class);
    expect(Weight::resolveUnitClass('lb'))->toBe(Pound::class);
});

// --- Full round-trip: resolve then use ---

test('resolved unit can be converted', function () {
    $km = Length::resolve('kilometer', 5.0);
    $m  = $km->toMeter();

    expect($m)->toBeInstanceOf(Meter::class);
    expect($m->getValue())->toBe(5000.0);
});

test('resolved temperature converts correctly', function () {
    $c = Temperature::resolve('celsius', 100.0);
    $f = $c->toFahrenheit();

    expect($f->getValue())->toBe(212.0);
});
