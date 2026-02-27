<?php

declare(strict_types=1);

use Mesura\Generic\SimpleMeasurement;
use Mesura\UnitSystem;

test('fromValue creates instance with value', function () {
    $unit = SimpleMeasurement::fromValue(42.0);

    expect($unit)->toBeInstanceOf(SimpleMeasurement::class);
    expect($unit->getValue())->toBe(42.0);
});

test('fromValue sets custom symbol on instance', function () {
    $unit = SimpleMeasurement::fromValue(10.0, 'kg');

    expect($unit->getInstanceSymbol())->toBe('kg');
});

test('fromValue without symbol uses empty default', function () {
    $unit = SimpleMeasurement::fromValue(10.0);

    expect($unit->getInstanceSymbol())->toBe('');
});

test('constructor works directly', function () {
    $unit = new SimpleMeasurement(5.5, 'm');

    expect($unit->getValue())->toBe(5.5);
    expect($unit->getInstanceSymbol())->toBe('m');
});

test('unitSystem always returns Other', function () {
    expect(SimpleMeasurement::unitSystem())->toBe(UnitSystem::Other);
});

test('default symbol is empty string', function () {
    expect(SimpleMeasurement::getSymbol())->toBe('');
});

test('toString formats value with symbol', function () {
    $unit = SimpleMeasurement::fromValue(42.0, 'px');

    expect((string) $unit)->toBe('42 px');
});

test('toFormat works with custom symbol', function () {
    $unit = SimpleMeasurement::fromValue(42.0, 'px');

    expect($unit->toFormat())->toBe('42.0 px');
    expect($unit->toFormat('%.2f %s'))->toBe('42.00 px');
});

test('withValue transforms value and returns new instance', function () {
    $unit   = SimpleMeasurement::fromValue(10.0, 'u');
    $result = $unit->withValue(fn (float $v) => $v * 3);

    expect($result)->toBeInstanceOf(SimpleMeasurement::class);
    expect($result->getValue())->toBe(30.0);
    expect($result)->not->toBe($unit);
});

test('withValue preserves instance symbol', function () {
    $unit   = SimpleMeasurement::fromValue(10.0, 'px');
    $result = $unit->withValue(fn (float $v) => $v * 2);

    expect($result->getInstanceSymbol())->toBe('px');
    expect((string) $result)->toBe('20 px');
});

test('setInstanceSymbol changes symbol on instance', function () {
    $unit = SimpleMeasurement::fromValue(1.0, 'a');
    $unit->setInstanceSymbol('b');

    expect($unit->getInstanceSymbol())->toBe('b');
});
