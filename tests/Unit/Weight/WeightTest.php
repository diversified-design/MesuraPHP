<?php

declare(strict_types=1);

use MeasurementUnit\Weight\Kilogram;
use MeasurementUnit\Weight\MetricTon;
use MeasurementUnit\Weight\Pound;
use MeasurementUnit\Weight\Weight;
use MeasurementUnit\Weight\WeightInterface;

describe('Weight', function () {
    test('stores value on construction', function () {
        $weight = new class(42.0) extends Weight {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromKilogramValue(float $value): WeightInterface
            {
                return new self($value);
            }

            public function toKilogramValue(): float
            {
                return 21.0;
            }
        };

        expect($weight->value)->toBe(42.0);
    });

    test('converts to all weight units', function () {
        $weight = new class(42.0) extends Weight {
            public static function getSymbol(): string
            {
                return '';
            }

            public static function fromKilogramValue(float $value): WeightInterface
            {
                return new self($value);
            }

            public function toKilogramValue(): float
            {
                return 21.0;
            }
        };

        expect($weight->toKilogram())->toBeInstanceOf(Kilogram::class);
        expect($weight->toKilogram()->getValue())->toEqualWithDelta(21.0, 0.000001);
        expect($weight->toMetricTon())->toBeInstanceOf(MetricTon::class);
        // expect($weight->toPound())->toBeInstanceOf(Pound::class);
    });

    test('casts to string', function () {
        $weight = new class(42.0) extends Weight {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromKilogramValue(float $value): WeightInterface
            {
                return new self($value);
            }

            public function toKilogramValue(): float
            {
                return 21.0;
            }
        };

        expect($weight->__toString())->toBe('42 unit');
    });
});
