<?php

declare(strict_types=1);

use Mesura\Weight\Centigram;
use Mesura\Weight\Decagram;
use Mesura\Weight\Decigram;
use Mesura\Weight\Gram;
use Mesura\Weight\Hectogram;
use Mesura\Weight\Kilogram;
use Mesura\Weight\Megagram;
use Mesura\Weight\MetricTon;
use Mesura\Weight\Microgram;
use Mesura\Weight\Milligram;
use Mesura\Weight\Nanogram;
use Mesura\Weight\Pound;
use Mesura\Weight\Weight;

describe('Weight', function () {
    test('stores value on construction', function () {
        $weight = new class(42.0) extends Weight {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromKilogramValue(float $value): static
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

            public static function fromKilogramValue(float $value): static
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

            public static function fromKilogramValue(float $value): static
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
