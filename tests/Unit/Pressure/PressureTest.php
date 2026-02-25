<?php

declare(strict_types=1);

use Mesura\Pressure\Bar;
use Mesura\Pressure\Hectopascal;
use Mesura\Pressure\Kilopascal;
use Mesura\Pressure\Millibar;
use Mesura\Pressure\MillimetreOfMercury;
use Mesura\Pressure\Pascal;
use Mesura\Pressure\PoundPerSquareInch;
use Mesura\Pressure\Pressure;
use Mesura\Pressure\StandardAtmosphere;
use Mesura\Pressure\Torr;

describe('Pressure', function () {
    test('stores value on construction', function () {
        $pressure = new class(42.0) extends Pressure {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromPascalValue(float $value): static
            {
                return new self($value);
            }

            public function toPascalValue(): float
            {
                return 21.0;
            }

            public static function unitSystem(): Mesura\UnitSystem
            {
                return Mesura\UnitSystem::Other;
            }
        };

        expect($pressure->value)->toBe(42.0);
    });

    test('converts to all pressure units', function () {
        $pressure = new class(42.0) extends Pressure {
            public static function getSymbol(): string
            {
                return '';
            }

            public static function fromPascalValue(float $value): static
            {
                return new self($value);
            }

            public function toPascalValue(): float
            {
                return 21.0;
            }

            public static function unitSystem(): Mesura\UnitSystem
            {
                return Mesura\UnitSystem::Other;
            }
        };

        expect($pressure->toBar())->toBeInstanceOf(Bar::class);
        expect($pressure->toHectopascal())->toBeInstanceOf(Hectopascal::class);
        expect($pressure->toKilopascal())->toBeInstanceOf(Kilopascal::class);
        expect($pressure->toMillibar())->toBeInstanceOf(Millibar::class);
        expect($pressure->toMillimetreOfMercury())->toBeInstanceOf(MillimetreOfMercury::class);
        expect($pressure->toPascal())->toBeInstanceOf(Pascal::class);
        expect($pressure->toPascal()->getValue())->toEqualWithDelta(21.0, 0.000001);
        expect($pressure->toPoundPerSquareInch())->toBeInstanceOf(PoundPerSquareInch::class);
        expect($pressure->toStandardAtmosphere())->toBeInstanceOf(StandardAtmosphere::class);
        expect($pressure->toTorr())->toBeInstanceOf(Torr::class);
    });

    test('casts to string', function () {
        $pressure = new class(42.0) extends Pressure {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromPascalValue(float $value): static
            {
                return new self($value);
            }

            public function toPascalValue(): float
            {
                return 21.0;
            }

            public static function unitSystem(): Mesura\UnitSystem
            {
                return Mesura\UnitSystem::Other;
            }
        };

        expect($pressure->__toString())->toBe('42 unit');
    });
});
