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
use Mesura\Volume\Kiloliter;
use Mesura\Volume\Liter;
use Mesura\Volume\Milliliter;
use Mesura\Volume\Pint;
use Mesura\Volume\Quart;
use Mesura\Volume\TableSpoon;
use Mesura\Volume\Volume;

describe('Volume', function () {
    test('stores value on construction', function () {
        $volume = new class(42.0) extends Volume {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromCubicMeterValue(float $value): static
            {
                return new self($value);
            }

            public function toCubicMeterValue(): float
            {
                return 21.0;
            }

            public static function unitSystem(): Mesura\UnitSystem
            {
                return Mesura\UnitSystem::Other;
            }
        };

        expect($volume->value)->toBe(42.0);
    });

    test('converts to all volume units', function () {
        $volume = new class(42.0) extends Volume {
            public static function getSymbol(): string
            {
                return '';
            }

            public static function fromCubicMeterValue(float $value): static
            {
                return new self($value);
            }

            public function toCubicMeterValue(): float
            {
                return 21.0;
            }

            public static function unitSystem(): Mesura\UnitSystem
            {
                return Mesura\UnitSystem::Other;
            }
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
        expect($volume->toMilliliter())->toBeInstanceOf(Milliliter::class);
        expect($volume->toCentiliter())->toBeInstanceOf(Centiliter::class);
        expect($volume->toDeciliter())->toBeInstanceOf(Deciliter::class);
        expect($volume->toDecaliter())->toBeInstanceOf(Decaliter::class);
        expect($volume->toHectoliter())->toBeInstanceOf(Hectoliter::class);
        expect($volume->toKiloliter())->toBeInstanceOf(Kiloliter::class);
    });

    test('casts to string', function () {
        $volume = new class(42.0) extends Volume {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromCubicMeterValue(float $value): static
            {
                return new self($value);
            }

            public function toCubicMeterValue(): float
            {
                return 21.0;
            }

            public static function unitSystem(): Mesura\UnitSystem
            {
                return Mesura\UnitSystem::Other;
            }
        };

        expect($volume->__toString())->toBe('42 unit');
    });
});
