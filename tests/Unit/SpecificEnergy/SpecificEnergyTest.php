<?php

declare(strict_types=1);

use Mesura\SpecificEnergy\BtuPerPound;
use Mesura\SpecificEnergy\CaloriePerGram;
use Mesura\SpecificEnergy\JoulePerKilogram;
use Mesura\SpecificEnergy\KilojoulePerKilogram;
use Mesura\SpecificEnergy\MegajoulePerKilogram;
use Mesura\SpecificEnergy\SpecificEnergy;

describe('SpecificEnergy', function () {
    test('stores value on construction', function () {
        $se = new class(42.0) extends SpecificEnergy {
            protected static string $defaultSymbol = 'unit';

            public static function fromJoulePerKilogramValue(float $value): static
            {
                return new static($value);
            }

            public function toJoulePerKilogramValue(): float
            {
                return $this->value;
            }
        };

        expect($se->value)->toBe(42.0);
    });

    test('converts to all specific energy units', function () {
        $se = new JoulePerKilogram(42.0);

        expect($se->toJoulePerKilogram())->toBeInstanceOf(JoulePerKilogram::class);
        expect($se->toKilojoulePerKilogram())->toBeInstanceOf(KilojoulePerKilogram::class);
        expect($se->toMegajoulePerKilogram())->toBeInstanceOf(MegajoulePerKilogram::class);
        expect($se->toBtuPerPound())->toBeInstanceOf(BtuPerPound::class);
        expect($se->toCaloriePerGram())->toBeInstanceOf(CaloriePerGram::class);
    });

    test('casts to string', function () {
        $se = new JoulePerKilogram(42.0);

        expect($se->__toString())->toBe('42 J/kg');
    });
});
