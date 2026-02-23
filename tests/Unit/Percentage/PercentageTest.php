<?php

declare(strict_types=1);

use MeasurementUnit\Percentage\Percentage;

describe('Percentage', function () {
    test('stores value on construction', function () {
        $percentage = new class(42.0) extends Percentage {
            public static function getSymbol(): string
            {
                return 'unit';
            }
        };

        expect($percentage->value)->toBe(42.0);
    });

    test('returns symbol', function () {
        $percentage = new class(42.0) extends Percentage {
            public static function getSymbol(): string
            {
                return 'unit';
            }
        };

        expect($percentage->getSymbol())->toBe('unit');
    });

    test('casts to string', function () {
        $percentage = new class(42.0) extends Percentage {
            public static function getSymbol(): string
            {
                return 'unit';
            }
        };

        expect($percentage->__toString())->toBe('42 unit');
    });
});
