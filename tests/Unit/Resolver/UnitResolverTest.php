<?php

declare(strict_types=1);

use Mesura\InvalidUnitException;
use Mesura\Length\Centimeter;
use Mesura\Length\Foot;
use Mesura\Length\Kilometer;
use Mesura\Length\Length;
use Mesura\Length\Meter;
use Mesura\Length\Millimeter;
use Mesura\Length\Nanometer;
use Mesura\Length\NauticalMile;
use Mesura\Length\StatuteMile;
use Mesura\Length\SurveyMile;
use Mesura\Resolver\UnitResolver;
use Mesura\Temperature\Celsius;
use Mesura\Temperature\Fahrenheit;
use Mesura\Temperature\Kelvin;
use Mesura\Temperature\Rankine;
use Mesura\Temperature\Temperature;

beforeEach(function () {
    UnitResolver::clearCache();
});

// --- Length domain: symbol-based resolution ---

test('resolves length unit by default symbol', function () {
    expect(Length::resolveUnitClass('m'))->toBe(Meter::class);
    expect(Length::resolveUnitClass('ft'))->toBe(Foot::class);
    expect(Length::resolveUnitClass('km'))->toBe(Kilometer::class);
});

test('resolves length unit by name alias', function () {
    expect(Length::resolveUnitClass('meter'))->toBe(Meter::class);
    expect(Length::resolveUnitClass('metre'))->toBe(Meter::class);
    expect(Length::resolveUnitClass('foot'))->toBe(Foot::class);
});

test('resolves length unit case-insensitively', function () {
    expect(Length::resolveUnitClass('Meter'))->toBe(Meter::class);
    expect(Length::resolveUnitClass('METER'))->toBe(Meter::class);
    expect(Length::resolveUnitClass('Ft'))->toBe(Foot::class);
    expect(Length::resolveUnitClass('KM'))->toBe(Kilometer::class);
});

test('resolves metric-prefixed length by composed name', function () {
    expect(Length::resolveUnitClass('kilometer'))->toBe(Kilometer::class);
    expect(Length::resolveUnitClass('kilometre'))->toBe(Kilometer::class);
    expect(Length::resolveUnitClass('millimeter'))->toBe(Millimeter::class);
    expect(Length::resolveUnitClass('centimeter'))->toBe(Centimeter::class);
    expect(Length::resolveUnitClass('nanometer'))->toBe(Nanometer::class);
});

test('resolves statute mile by short alias', function () {
    expect(Length::resolveUnitClass('mile'))->toBe(StatuteMile::class);
});

test('resolves nautical mile by full name', function () {
    expect(Length::resolveUnitClass('nautical mile'))->toBe(NauticalMile::class);
});

test('resolves survey mile by full name', function () {
    expect(Length::resolveUnitClass('survey mile'))->toBe(SurveyMile::class);
});

// --- Length domain: hydrated resolution ---

test('resolve returns hydrated length instance', function () {
    $result = Length::resolve('km', 42.0);

    expect($result)->toBeInstanceOf(Kilometer::class);
    expect($result->getValue())->toBe(42.0);
});

test('resolve returns hydrated meter instance by name', function () {
    $result = Length::resolve('meter', 100.0);

    expect($result)->toBeInstanceOf(Meter::class);
    expect($result->getValue())->toBe(100.0);
});

// --- Temperature domain: non-metric ---

test('resolves temperature by name', function () {
    expect(Temperature::resolveUnitClass('celsius'))->toBe(Celsius::class);
    expect(Temperature::resolveUnitClass('fahrenheit'))->toBe(Fahrenheit::class);
    expect(Temperature::resolveUnitClass('kelvin'))->toBe(Kelvin::class);
    expect(Temperature::resolveUnitClass('rankine'))->toBe(Rankine::class);
});

test('resolves temperature by symbol', function () {
    expect(Temperature::resolveUnitClass('°C'))->toBe(Celsius::class);
    expect(Temperature::resolveUnitClass('°F'))->toBe(Fahrenheit::class);
    expect(Temperature::resolveUnitClass('K'))->toBe(Kelvin::class);
});

test('resolves centigrade as celsius alias', function () {
    expect(Temperature::resolveUnitClass('centigrade'))->toBe(Celsius::class);
});

test('resolve returns hydrated temperature instance', function () {
    $result = Temperature::resolve('celsius', 28.0);

    expect($result)->toBeInstanceOf(Celsius::class);
    expect($result->getValue())->toBe(28.0);
});

// --- Error handling ---

test('throws InvalidUnitException for unknown unit', function () {
    Length::resolveUnitClass('unknown_unit');
})->throws(InvalidUnitException::class);

test('throws InvalidUnitException for empty string', function () {
    Length::resolveUnitClass('');
})->throws(InvalidUnitException::class);

test('throws InvalidUnitException for whitespace-only string', function () {
    Length::resolveUnitClass('   ');
})->throws(InvalidUnitException::class);

test('InvalidUnitException extends InvalidArgumentException', function () {
    expect(new InvalidUnitException())->toBeInstanceOf(InvalidArgumentException::class);
});

// --- Edge cases ---

test('resolves with leading/trailing whitespace', function () {
    expect(Length::resolveUnitClass('  km  '))->toBe(Kilometer::class);
});

test('duplicate explicit alias throws LogicException', function () {
    UnitResolver::resolveClass(
        'test-collision',
        [
            Meter::class => ['shared'],
            Foot::class  => ['shared'],
        ],
        null,
        'shared',
    );
})->throws(\LogicException::class);
