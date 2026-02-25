<?php

declare(strict_types=1);

use Mesura\Energy\BritishThermalUnit;
use Mesura\Energy\Calorie;
use Mesura\Energy\Energy;
use Mesura\Energy\FootPound;
use Mesura\Energy\Gigajoule;
use Mesura\Energy\Joule;
use Mesura\Energy\Kilocalorie;
use Mesura\Energy\Kilojoule;
use Mesura\Energy\KilowattHour;
use Mesura\Energy\Megajoule;
use Mesura\Energy\Microjoule;
use Mesura\Energy\Millijoule;
use Mesura\Energy\Nanojoule;
use Mesura\Energy\WattHour;

describe('Energy', function () {
    test('stores value on construction', function () {
        $energy = new class(42.0) extends Energy {
            protected static string $defaultSymbol = 'unit';

            public static function fromJouleValue(float $value): static
            {
                return new self($value);
            }

            public function toJouleValue(): float
            {
                return $this->value;
            }

            public static function unitSystem(): Mesura\UnitSystem
            {
                return Mesura\UnitSystem::Other;
            }
        };

        expect($energy->value)->toBe(42.0);
    });

    test('converts to all named energy units', function () {
        $energy = new Joule(42.0);

        expect($energy->toJoule())->toBeInstanceOf(Joule::class);
        expect($energy->toKilojoule())->toBeInstanceOf(Kilojoule::class);
        expect($energy->toMegajoule())->toBeInstanceOf(Megajoule::class);
        expect($energy->toGigajoule())->toBeInstanceOf(Gigajoule::class);
        expect($energy->toMillijoule())->toBeInstanceOf(Millijoule::class);
        expect($energy->toMicrojoule())->toBeInstanceOf(Microjoule::class);
        expect($energy->toNanojoule())->toBeInstanceOf(Nanojoule::class);
        expect($energy->toCalorie())->toBeInstanceOf(Calorie::class);
        expect($energy->toKilocalorie())->toBeInstanceOf(Kilocalorie::class);
        expect($energy->toBritishThermalUnit())->toBeInstanceOf(BritishThermalUnit::class);
        expect($energy->toWattHour())->toBeInstanceOf(WattHour::class);
        expect($energy->toKilowattHour())->toBeInstanceOf(KilowattHour::class);
        expect($energy->toFootPound())->toBeInstanceOf(FootPound::class);
    });

    test('casts to string', function () {
        $energy = new Joule(42.0);

        expect($energy->__toString())->toBe('42 J');
    });
});
