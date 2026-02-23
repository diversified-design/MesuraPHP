<?php

declare(strict_types=1);

use MeasurementUnit\Pressure\Bar;
use MeasurementUnit\Pressure\Hectopascal;
use MeasurementUnit\Pressure\Kilopascal;
use MeasurementUnit\Pressure\Millibar;
use MeasurementUnit\Pressure\MillimetreOfMercury;
use MeasurementUnit\Pressure\Pascal;
use MeasurementUnit\Pressure\PoundPerSquareInch;
use MeasurementUnit\Pressure\Pressure;
use MeasurementUnit\Pressure\PressureInterface;
use MeasurementUnit\Pressure\StandardAtmosphere;
use MeasurementUnit\Pressure\Torr;

describe('Pressure', function () {
    test('stores value on construction', function () {
        $pressure = new class(42.0) extends Pressure {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromPascalValue(float $value): PressureInterface
            {
                return new self($value);
            }

            public function toPascalValue(): float
            {
                return 21.0;
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

            public static function fromPascalValue(float $value): PressureInterface
            {
                return new self($value);
            }

            public function toPascalValue(): float
            {
                return 21.0;
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

            public static function fromPascalValue(float $value): PressureInterface
            {
                return new self($value);
            }

            public function toPascalValue(): float
            {
                return 21.0;
            }
        };

        expect($pressure->__toString())->toBe('42 unit');
    });
});
