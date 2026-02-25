<?php

declare(strict_types=1);

use Mesura\ArealDensity\ArealDensity;
use Mesura\ArealDensity\GramPerSquareMeter;
use Mesura\ArealDensity\KilogramPerSquareMeter;
use Mesura\ArealDensity\OuncePerSquareYard;
use Mesura\ArealDensity\PoundPerSquareFoot;

describe('ArealDensity', function () {
    test('stores value on construction', function () {
        $ad = new class(42.0) extends ArealDensity {
            protected static string $defaultSymbol = 'unit';

            public static function fromKilogramPerSquareMeterValue(float $value): static
            {
                return new self($value);
            }

            public function toKilogramPerSquareMeterValue(): float
            {
                return $this->value;
            }

            public static function unitSystem(): Mesura\UnitSystem
            {
                return Mesura\UnitSystem::Other;
            }
        };

        expect($ad->value)->toBe(42.0);
    });

    test('converts to all areal density units', function () {
        $ad = new KilogramPerSquareMeter(1.0);

        expect($ad->toKilogramPerSquareMeter())->toBeInstanceOf(KilogramPerSquareMeter::class);
        expect($ad->toGramPerSquareMeter())->toBeInstanceOf(GramPerSquareMeter::class);
        expect($ad->toOuncePerSquareYard())->toBeInstanceOf(OuncePerSquareYard::class);
        expect($ad->toPoundPerSquareFoot())->toBeInstanceOf(PoundPerSquareFoot::class);
    });

    test('casts to string', function () {
        $ad = new KilogramPerSquareMeter(42.0);

        expect($ad->__toString())->toBe('42 kg/m²');
    });
});
