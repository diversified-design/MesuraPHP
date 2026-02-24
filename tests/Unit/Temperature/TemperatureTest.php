<?php

declare(strict_types=1);

use MeasurementUnit\Temperature\Celsius;
use MeasurementUnit\Temperature\Fahrenheit;
use MeasurementUnit\Temperature\Kelvin;
use MeasurementUnit\Temperature\Rankine;
use MeasurementUnit\Temperature\Temperature;
use MeasurementUnit\Temperature\TemperatureInterface;

describe('Temperature', function () {
    test('stores value on construction', function () {
        $temperature = new class(42.0) extends Temperature {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromKelvinValue(float $value): static
            {
                return new self($value);
            }

            public function toKelvinValue(): float
            {
                return 21.0;
            }
        };

        expect($temperature->value)->toBe(42.0);
    });

    test('converts to all temperature units', function () {
        $temperature = new class(42.0) extends Temperature {
            public static function getSymbol(): string
            {
                return '';
            }

            public static function fromKelvinValue(float $value): static
            {
                return new self($value);
            }

            public function toKelvinValue(): float
            {
                return 21.0;
            }
        };

        expect($temperature->toCelsius())->toBeInstanceOf(Celsius::class);
        expect($temperature->toFahrenheit())->toBeInstanceOf(Fahrenheit::class);
        expect($temperature->toKelvin())->toBeInstanceOf(Kelvin::class);
        expect($temperature->toKelvin()->getValue())->toEqualWithDelta(21.0, 0.000001);
        expect($temperature->toRankine())->toBeInstanceOf(Rankine::class);
    });

    test('casts to string', function () {
        $temperature = new class(42.0) extends Temperature {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromKelvinValue(float $value): static
            {
                return new self($value);
            }

            public function toKelvinValue(): float
            {
                return 21.0;
            }
        };

        expect($temperature->__toString())->toBe('42 unit');
    });
});
