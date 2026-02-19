<?php

declare(strict_types=1);

use MeasurementUnit\Length\Centimeter;
use MeasurementUnit\Length\Fathom;
use MeasurementUnit\Length\Foot;
use MeasurementUnit\Length\Furlong;
use MeasurementUnit\Length\HorseLength;
use MeasurementUnit\Length\Inch;
use MeasurementUnit\Length\Kilometer;
use MeasurementUnit\Length\Length;
use MeasurementUnit\Length\LengthInterface;
use MeasurementUnit\Length\Meter;
use MeasurementUnit\Length\Millimeter;
use MeasurementUnit\Length\NauticalMile;
use MeasurementUnit\Length\StatuteMile;
use MeasurementUnit\Length\SurveyMile;
use MeasurementUnit\Length\Thou;
use MeasurementUnit\Length\Yard;

describe('Length', function () {
    test('stores value on construction', function () {
        $length = new class (42.0) extends Length {
            public static function getSymbol(): string { return 'unit'; }
            public static function fromMeterValue(float $value): LengthInterface { return new self($value); }
            public function toMeterValue(): float { return 21.0; }
        };

        expect($length->value)->toBe(42.0);
    });

    test('converts to all length units', function () {
        $length = new class (42.0) extends Length {
            public static function getSymbol(): string { return ''; }
            public static function fromMeterValue(float $value): LengthInterface { return new self($value); }
            public function toMeterValue(): float { return 21.0; }
        };

        expect($length->toFathom())->toBeInstanceOf(Fathom::class);
        expect($length->toFoot())->toBeInstanceOf(Foot::class);
        expect($length->toFurlong())->toBeInstanceOf(Furlong::class);
        expect($length->toHorseLength())->toBeInstanceOf(HorseLength::class);
        expect($length->toInch())->toBeInstanceOf(Inch::class);
        expect($length->toMeter())->toBeInstanceOf(Meter::class);
        expect($length->toMeter()->getValue())->toEqualWithDelta(21.0, 0.000001);
        expect($length->toStatuteMile())->toBeInstanceOf(StatuteMile::class);
        expect($length->toNauticalMile())->toBeInstanceOf(NauticalMile::class);
        expect($length->toSurveyMile())->toBeInstanceOf(SurveyMile::class);
        expect($length->toThou())->toBeInstanceOf(Thou::class);
        expect($length->toYard())->toBeInstanceOf(Yard::class);
        expect($length->toKilometer())->toBeInstanceOf(Kilometer::class);
    });

    test('casts to string', function () {
        $length = new class (42.0) extends Length {
            public static function getSymbol(): string { return 'unit'; }
            public static function fromMeterValue(float $value): LengthInterface { return new self($value); }
            public function toMeterValue(): float { return 21.0; }
        };

        expect($length->__toString())->toBe('42 unit');
    });
});
