<?php

declare(strict_types=1);

use Mesura\Power\BtuPerHour;
use Mesura\Power\CaloriePerSecond;
use Mesura\Power\FootPoundPerSecond;
use Mesura\Power\Gigawatt;
use Mesura\Power\Horsepower;
use Mesura\Power\Kilowatt;
use Mesura\Power\Megawatt;
use Mesura\Power\Microwatt;
use Mesura\Power\Milliwatt;
use Mesura\Power\Power;
use Mesura\Power\Watt;

describe('Power', function () {
    test('stores value on construction', function () {
        $power = new class(42.0) extends Power {
            protected static string $defaultSymbol = 'unit';

            public static function fromWattValue(float $value): static
            {
                return new static($value);
            }

            public function toWattValue(): float
            {
                return $this->value;
            }
        };

        expect($power->value)->toBe(42.0);
    });

    test('converts to all named power units', function () {
        $power = new Watt(42.0);

        expect($power->toWatt())->toBeInstanceOf(Watt::class);
        expect($power->toKilowatt())->toBeInstanceOf(Kilowatt::class);
        expect($power->toMegawatt())->toBeInstanceOf(Megawatt::class);
        expect($power->toGigawatt())->toBeInstanceOf(Gigawatt::class);
        expect($power->toMilliwatt())->toBeInstanceOf(Milliwatt::class);
        expect($power->toMicrowatt())->toBeInstanceOf(Microwatt::class);
        expect($power->toHorsepower())->toBeInstanceOf(Horsepower::class);
        expect($power->toBtuPerHour())->toBeInstanceOf(BtuPerHour::class);
        expect($power->toFootPoundPerSecond())->toBeInstanceOf(FootPoundPerSecond::class);
        expect($power->toCaloriePerSecond())->toBeInstanceOf(CaloriePerSecond::class);
    });

    test('casts to string', function () {
        $power = new Watt(42.0);

        expect($power->__toString())->toBe('42 W');
    });
});
