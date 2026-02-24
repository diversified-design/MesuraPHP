<?php

declare(strict_types=1);

use MeasurementUnit\Weight\Centigram;
use MeasurementUnit\Weight\Decagram;
use MeasurementUnit\Weight\Decigram;
use MeasurementUnit\Weight\Gram;
use MeasurementUnit\Weight\Hectogram;
use MeasurementUnit\Weight\Kilogram;
use MeasurementUnit\Weight\Megagram;
use MeasurementUnit\Weight\MetricTon;
use MeasurementUnit\Weight\Microgram;
use MeasurementUnit\Weight\Milligram;
use MeasurementUnit\Weight\Nanogram;
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
        expect($weight->toGram())->toBeInstanceOf(Gram::class);
        expect($weight->toMilligram())->toBeInstanceOf(Milligram::class);
        expect($weight->toMicrogram())->toBeInstanceOf(Microgram::class);
        expect($weight->toNanogram())->toBeInstanceOf(Nanogram::class);
        expect($weight->toDecigram())->toBeInstanceOf(Decigram::class);
        expect($weight->toCentigram())->toBeInstanceOf(Centigram::class);
        expect($weight->toDecagram())->toBeInstanceOf(Decagram::class);
        expect($weight->toHectogram())->toBeInstanceOf(Hectogram::class);
        expect($weight->toMegagram())->toBeInstanceOf(Megagram::class);
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
