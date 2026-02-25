<?php

declare(strict_types=1);

use Mesura\MassConcentration\GrainPerCubicFoot;
use Mesura\MassConcentration\GrainPerCubicMeter;
use Mesura\MassConcentration\GramPerCubicMeter;
use Mesura\MassConcentration\KilogramPerCubicMeter;
use Mesura\MassConcentration\MassConcentration;
use Mesura\MassConcentration\MicrogramPerCubicMeter;
use Mesura\MassConcentration\MilligramPerCubicMeter;

describe('MassConcentration', function () {
    test('stores value on construction', function () {
        $mc = new class(42.0) extends MassConcentration {
            protected static string $defaultSymbol = 'unit';

            public static function fromKilogramPerCubicMeterValue(float $value): static
            {
                return new self($value);
            }

            public function toKilogramPerCubicMeterValue(): float
            {
                return $this->value;
            }

            public static function unitSystem(): Mesura\UnitSystem
            {
                return Mesura\UnitSystem::Other;
            }
        };

        expect($mc->value)->toBe(42.0);
    });

    test('converts to all mass concentration units', function () {
        $mc = new KilogramPerCubicMeter(1.0);

        expect($mc->toKilogramPerCubicMeter())->toBeInstanceOf(KilogramPerCubicMeter::class);
        expect($mc->toGramPerCubicMeter())->toBeInstanceOf(GramPerCubicMeter::class);
        expect($mc->toMilligramPerCubicMeter())->toBeInstanceOf(MilligramPerCubicMeter::class);
        expect($mc->toMicrogramPerCubicMeter())->toBeInstanceOf(MicrogramPerCubicMeter::class);
        expect($mc->toGrainPerCubicMeter())->toBeInstanceOf(GrainPerCubicMeter::class);
        expect($mc->toGrainPerCubicFoot())->toBeInstanceOf(GrainPerCubicFoot::class);
    });

    test('casts to string', function () {
        $mc = new KilogramPerCubicMeter(42.0);

        expect($mc->__toString())->toBe('42 kg/m³');
    });
});
