<?php

declare(strict_types=1);

use MeasurementUnit\Speed\KilometerPerHour;
use MeasurementUnit\Speed\Knot;
use MeasurementUnit\Speed\MeterPerSecond;
use MeasurementUnit\Speed\MilesPerHour;
use MeasurementUnit\Speed\Speed;

describe('Speed', function () {
    test('stores value on construction', function () {
        $speed = new class(42.0) extends Speed {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromMeterPerSecondValue(float $value): static
            {
                return new self($value);
            }

            public function toMeterPerSecondValue(): float
            {
                return 21.0;
            }
        };

        expect($speed->value)->toBe(42.0);
    });

    test('converts to all speed units', function () {
        $speed = new class(42.0) extends Speed {
            public static function getSymbol(): string
            {
                return '';
            }

            public static function fromMeterPerSecondValue(float $value): static
            {
                return new self($value);
            }

            public function toMeterPerSecondValue(): float
            {
                return 21.0;
            }
        };

        expect($speed->toKilometerPerHour())->toBeInstanceOf(KilometerPerHour::class);
        expect($speed->toMeterPerSecond())->toBeInstanceOf(MeterPerSecond::class);
        expect($speed->toMeterPerSecond()->getValue())->toEqualWithDelta(21.0, 0.000001);
        expect($speed->toMilesPerHour())->toBeInstanceOf(MilesPerHour::class);
        expect($speed->toKnot())->toBeInstanceOf(Knot::class);
    });

    test('casts to string', function () {
        $speed = new class(42.0) extends Speed {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromMeterPerSecondValue(float $value): static
            {
                return new self($value);
            }

            public function toMeterPerSecondValue(): float
            {
                return 21.0;
            }
        };

        expect($speed->__toString())->toBe('42 unit');
    });
});
