<?php

declare(strict_types=1);

use MeasurementUnit\Angle\Angle;
use MeasurementUnit\Angle\AngleInterface;
use MeasurementUnit\Angle\Degree;
use MeasurementUnit\Angle\Radian;

describe('Angle', function () {
    test('stores value on construction', function () {
        $angle = new class(42.0) extends Angle {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromRadianValue(float $value): static
            {
                return new self($value);
            }

            public function toRadianValue(): float
            {
                return 0.733038;
            }
        };

        expect($angle->value)->toBe(42.0);
    });

    test('converts to all angle units', function () {
        $angle = new class(42.0) extends Angle {
            public static function getSymbol(): string
            {
                return '';
            }

            public static function fromRadianValue(float $value): static
            {
                return new self($value);
            }

            public function toRadianValue(): float
            {
                return 21.0;
            }
        };

        expect($angle->toDegree())->toBeInstanceOf(Degree::class);
        expect($angle->toRadian())->toBeInstanceOf(Radian::class);
        expect($angle->toRadian()->getValue())->toEqualWithDelta(21.0, 0.000001);
    });

    test('casts to string', function () {
        $angle = new class(42.0) extends Angle {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromRadianValue(float $value): static
            {
                return new self($value);
            }

            public function toRadianValue(): float
            {
                return 0.733038;
            }
        };

        expect($angle->__toString())->toBe('42 unit');
    });
});
