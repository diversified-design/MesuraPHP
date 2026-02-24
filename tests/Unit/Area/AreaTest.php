<?php

declare(strict_types=1);

use MeasurementUnit\Area\Acre;
use MeasurementUnit\Area\Area;
use MeasurementUnit\Area\Hectare;
use MeasurementUnit\Area\SquareCentimeter;
use MeasurementUnit\Area\SquareDecimeter;
use MeasurementUnit\Area\SquareFoot;
use MeasurementUnit\Area\SquareKilometer;
use MeasurementUnit\Area\SquareMeter;
use MeasurementUnit\Area\SquareMile;
use MeasurementUnit\Area\SquareMillimeter;

describe('Area', function () {
    test('stores value on construction', function () {
        $area = new class(42.0) extends Area {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromSquareMeterValue(float $value): static
            {
                return new self($value);
            }

            public function toSquareMeterValue(): float
            {
                return 21.0;
            }
        };

        expect($area->value)->toBe(42.0);
    });

    test('converts to all area units', function () {
        $area = new class(42.0) extends Area {
            public static function getSymbol(): string
            {
                return '';
            }

            public static function fromSquareMeterValue(float $value): static
            {
                return new self($value);
            }

            public function toSquareMeterValue(): float
            {
                return 21.0;
            }
        };

        expect($area->toSquareMeter())->toBeInstanceOf(SquareMeter::class);
        expect($area->toSquareMeter()->getValue())->toEqualWithDelta(21.0, 0.000001);
        expect($area->toSquareKilometer())->toBeInstanceOf(SquareKilometer::class);
        expect($area->toSquareFoot())->toBeInstanceOf(SquareFoot::class);
        expect($area->toSquareMile())->toBeInstanceOf(SquareMile::class);
        expect($area->toHectare())->toBeInstanceOf(Hectare::class);
        expect($area->toAcre())->toBeInstanceOf(Acre::class);
        expect($area->toSquareMillimeter())->toBeInstanceOf(SquareMillimeter::class);
        expect($area->toSquareCentimeter())->toBeInstanceOf(SquareCentimeter::class);
        expect($area->toSquareDecimeter())->toBeInstanceOf(SquareDecimeter::class);
    });

    test('casts to string', function () {
        $area = new class(42.0) extends Area {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromSquareMeterValue(float $value): static
            {
                return new self($value);
            }

            public function toSquareMeterValue(): float
            {
                return 21.0;
            }
        };

        expect($area->__toString())->toBe('42 unit');
    });
});
