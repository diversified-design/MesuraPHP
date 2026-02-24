<?php

declare(strict_types=1);

use Mesura\Length\Decameter;
use Mesura\Length\Decimeter;
use Mesura\Length\Fathom;
use Mesura\Length\Foot;
use Mesura\Length\Furlong;
use Mesura\Length\Hectometer;
use Mesura\Length\HorseLength;
use Mesura\Length\Inch;
use Mesura\Length\Kilometer;
use Mesura\Length\Length;
use Mesura\Length\Megameter;
use Mesura\Length\Meter;
use Mesura\Length\Micrometer;
use Mesura\Length\Nanometer;
use Mesura\Length\NauticalMile;
use Mesura\Length\StatuteMile;
use Mesura\Length\SurveyMile;
use Mesura\Length\Thou;
use Mesura\Length\Yard;

describe('Length', function () {
    test('stores value on construction', function () {
        $length = new class(42.0) extends Length {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromMeterValue(float $value): static
            {
                return new self($value);
            }

            public function toMeterValue(): float
            {
                return 21.0;
            }
        };

        expect($length->value)->toBe(42.0);
    });

    test('converts to all length units', function () {
        $length = new class(42.0) extends Length {
            public static function getSymbol(): string
            {
                return '';
            }

            public static function fromMeterValue(float $value): static
            {
                return new self($value);
            }

            public function toMeterValue(): float
            {
                return 21.0;
            }
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
        expect($length->toDecimeter())->toBeInstanceOf(Decimeter::class);
        expect($length->toDecameter())->toBeInstanceOf(Decameter::class);
        expect($length->toHectometer())->toBeInstanceOf(Hectometer::class);
        expect($length->toMegameter())->toBeInstanceOf(Megameter::class);
        expect($length->toMicrometer())->toBeInstanceOf(Micrometer::class);
        expect($length->toNanometer())->toBeInstanceOf(Nanometer::class);
    });

    test('casts to string', function () {
        $length = new class(42.0) extends Length {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromMeterValue(float $value): static
            {
                return new self($value);
            }

            public function toMeterValue(): float
            {
                return 21.0;
            }
        };

        expect($length->__toString())->toBe('42 unit');
    });
});
