<?php

declare(strict_types=1);

use Mesura\Percentage\Percentage;

describe('Percentage', function () {
    test('stores value on construction', function () {
        $percentage = new class(42.0) extends Percentage {
            protected static string $defaultSymbol = 'unit';

            public static function fromRatioValue(float $value): static
            {
                return new self($value);
            }

            public function toRatioValue(): float
            {
                return $this->value;
            }
        };

        expect($percentage->value)->toBe(42.0);
    });

    test('returns symbol', function () {
        $percentage = new class(42.0) extends Percentage {
            protected static string $defaultSymbol = 'unit';

            public static function fromRatioValue(float $value): static
            {
                return new self($value);
            }

            public function toRatioValue(): float
            {
                return $this->value;
            }
        };

        expect($percentage->getSymbol())->toBe('unit');
    });

    test('casts to string', function () {
        $percentage = new class(42.0) extends Percentage {
            protected static string $defaultSymbol = 'unit';

            public static function fromRatioValue(float $value): static
            {
                return new self($value);
            }

            public function toRatioValue(): float
            {
                return $this->value;
            }
        };

        expect($percentage->__toString())->toBe('42 unit');
    });
});
