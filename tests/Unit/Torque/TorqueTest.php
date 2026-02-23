<?php

declare(strict_types=1);

use MeasurementUnit\Torque\NewtonMeter;
use MeasurementUnit\Torque\Torque;
use MeasurementUnit\Torque\TorqueInterface;

describe('Torque', function () {
    test('stores value on construction', function () {
        $torque = new class(42.0) extends Torque {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromNewtonMeterValue(float $value): TorqueInterface
            {
                return new self($value);
            }

            public function toNewtonMeterValue(): float
            {
                return 21.0;
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

            public static function fromNewtonMeterValue(float $value): TorqueInterface
            {
                return new self($value);
            }

            public function toNewtonMeterValue(): float
            {
                return 21.0;
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

            public static function fromNewtonMeterValue(float $value): TorqueInterface
            {
                return new self($value);
            }

            public function toNewtonMeterValue(): float
            {
                return 21.0;
            }
        };

        expect($torque->__toString())->toBe('42 unit');
    });
});
