<?php

declare(strict_types=1);

use Mesura\Angle\Angle;
use Mesura\Angle\Degree;
use Mesura\Angle\Radian;

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

            public static function unitSystem(): Mesura\UnitSystem
            {
                return Mesura\UnitSystem::Other;
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

            public static function unitSystem(): Mesura\UnitSystem
            {
                return Mesura\UnitSystem::Other;
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

            public static function unitSystem(): Mesura\UnitSystem
            {
                return Mesura\UnitSystem::Other;
            }
        };

        expect($angle->__toString())->toBe('42 unit');
    });
});
