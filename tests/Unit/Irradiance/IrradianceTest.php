<?php

declare(strict_types=1);

use Mesura\Irradiance\BtuPerHourPerSquareFoot;
use Mesura\Irradiance\Irradiance;
use Mesura\Irradiance\KilowattPerSquareMeter;
use Mesura\Irradiance\WattPerSquareMeter;

describe('Irradiance', function () {
    test('stores value on construction', function () {
        $irr = new class(42.0) extends Irradiance {
            protected static string $defaultSymbol = 'unit';

            public static function fromWattPerSquareMeterValue(float $value): static
            {
                return new self($value);
            }

            public function toWattPerSquareMeterValue(): float
            {
                return $this->value;
            }

            public static function unitSystem(): Mesura\UnitSystem
            {
                return Mesura\UnitSystem::Other;
            }
        };

        expect($irr->value)->toBe(42.0);
    });

    test('converts to all irradiance units', function () {
        $irr = new WattPerSquareMeter(42.0);

        expect($irr->toWattPerSquareMeter())->toBeInstanceOf(WattPerSquareMeter::class);
        expect($irr->toKilowattPerSquareMeter())->toBeInstanceOf(KilowattPerSquareMeter::class);
        expect($irr->toBtuPerHourPerSquareFoot())->toBeInstanceOf(BtuPerHourPerSquareFoot::class);
    });

    test('casts to string', function () {
        $irr = new WattPerSquareMeter(42.0);

        expect($irr->__toString())->toBe('42 W/m²');
    });
});
