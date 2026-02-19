<?php

declare(strict_types=1);

use MeasurementUnit\Volume\CubicInch;
use MeasurementUnit\Volume\CubicMeter;
use MeasurementUnit\Volume\CubicYard;
use MeasurementUnit\Volume\FluidDram;
use MeasurementUnit\Volume\FluidOunce;
use MeasurementUnit\Volume\Liter;
use MeasurementUnit\Volume\Pint;
use MeasurementUnit\Volume\Quart;
use MeasurementUnit\Volume\TableSpoon;
use MeasurementUnit\Volume\Volume;
use MeasurementUnit\Volume\VolumeInterface;

describe('Volume', function () {
    test('stores value on construction', function () {
        $volume = new class (42.0) extends Volume {
            public static function getSymbol(): string { return 'unit'; }
            public static function fromCubicMeterValue(float $value): VolumeInterface { return new self($value); }
            public function toCubicMeterValue(): float { return 21.0; }
        };

        expect($volume->value)->toBe(42.0);
    });

    test('converts to all volume units', function () {
        $volume = new class (42.0) extends Volume {
            public static function getSymbol(): string { return ''; }
            public static function fromCubicMeterValue(float $value): VolumeInterface { return new self($value); }
            public function toCubicMeterValue(): float { return 21.0; }
        };

        expect($volume->toCubicInch())->toBeInstanceOf(CubicInch::class);
        expect($volume->toCubicMeter())->toBeInstanceOf(CubicMeter::class);
        expect($volume->toCubicMeter()->getValue())->toEqualWithDelta(21.0, 0.000001);
        expect($volume->toCubicYard())->toBeInstanceOf(CubicYard::class);
        expect($volume->toFluidDram())->toBeInstanceOf(FluidDram::class);
        expect($volume->toFluidOunce())->toBeInstanceOf(FluidOunce::class);
        expect($volume->toLiter())->toBeInstanceOf(Liter::class);
        expect($volume->toPint())->toBeInstanceOf(Pint::class);
        expect($volume->toQuart())->toBeInstanceOf(Quart::class);
        expect($volume->toTableSpoon())->toBeInstanceOf(TableSpoon::class);
    });

    test('casts to string', function () {
        $volume = new class (42.0) extends Volume {
            public static function getSymbol(): string { return 'unit'; }
            public static function fromCubicMeterValue(float $value): VolumeInterface { return new self($value); }
            public function toCubicMeterValue(): float { return 21.0; }
        };

        expect($volume->__toString())->toBe('42 unit');
    });
});
