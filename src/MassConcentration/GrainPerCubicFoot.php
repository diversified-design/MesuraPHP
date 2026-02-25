<?php

declare(strict_types=1);

namespace Mesura\MassConcentration;

use Brick\Math\BigRational;

class GrainPerCubicFoot extends MassConcentration
{
    protected static string $defaultSymbol = 'gr/ft³';

    /** 1 grain = 64.79891 mg = 0.00006479891 kg */
    private const GRAIN_TO_KG = '0.00006479891';

    /** 1 ft³ = 0.3048³ m³ = 0.028316846592 m³ */
    private const CUBIC_FOOT_TO_CUBIC_METER = '0.028316846592';

    public static function fromKilogramPerCubicMeterValue(float $value): static
    {
        // grains/ft³ = (kg/m³) * (ft³/m³) / (kg/grain)
        return new static(
            BigRational::of((string) $value)
                ->multipliedBy(self::CUBIC_FOOT_TO_CUBIC_METER)
                ->dividedBy(self::GRAIN_TO_KG)
                ->toFloat()
        );
    }

    public function toKilogramPerCubicMeterValue(): float
    {
        // kg/m³ = (grains/ft³) * (kg/grain) / (ft³/m³)
        return BigRational::of((string) $this->value)
            ->multipliedBy(self::GRAIN_TO_KG)
            ->dividedBy(self::CUBIC_FOOT_TO_CUBIC_METER)
            ->toFloat();
    }
}
