<?php

declare(strict_types=1);

use Mesura\Torque\NewtonMeter;
use Mesura\Torque\Torque;

describe('Torque', function () {
    test('stores value on construction', function () {
        $torque = new class(42.0) extends Torque {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromNewtonMeterValue(float $value): static
            {
                return new self($value);
            }

            public function toNewtonMeterValue(): float
            {
                return 21.0;
            }

            public static function unitSystem(): Mesura\UnitSystem
            {
                return Mesura\UnitSystem::Other;
            }
        };

        expect($torque->value)->toBe(42.0);
    });

    test('converts to all torque units', function () {
        $torque = new class(42.0) extends Torque {
            public static function getSymbol(): string
            {
                return '';
            }

            public static function fromNewtonMeterValue(float $value): static
            {
                return new self($value);
            }

            public function toNewtonMeterValue(): float
            {
                return 21.0;
            }

            public static function unitSystem(): Mesura\UnitSystem
            {
                return Mesura\UnitSystem::Other;
            }
        };

        expect($torque->toNewtonMeter())->toBeInstanceOf(NewtonMeter::class);
        expect($torque->toNewtonMeter()->getValue())->toEqualWithDelta(21.0, 0.000001);
    });

    test('casts to string', function () {
        $torque = new class(42.0) extends Torque {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromNewtonMeterValue(float $value): static
            {
                return new self($value);
            }

            public function toNewtonMeterValue(): float
            {
                return 21.0;
            }

            public static function unitSystem(): Mesura\UnitSystem
            {
                return Mesura\UnitSystem::Other;
            }
        };

        expect($torque->__toString())->toBe('42 unit');
    });
});
