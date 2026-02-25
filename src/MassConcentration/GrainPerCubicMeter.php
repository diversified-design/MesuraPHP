<?php

declare(strict_types=1);

namespace Mesura\MassConcentration;

use Brick\Math\BigRational;

class GrainPerCubicMeter extends MassConcentration
{
    protected static string $defaultSymbol = 'gr/m³';

    /** 1 grain = 64.79891 mg = 0.00006479891 kg */
    private const GRAIN_TO_KG = '0.00006479891';

    public static function fromKilogramPerCubicMeterValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy(self::GRAIN_TO_KG)->toFloat()
        );
    }

    public function toKilogramPerCubicMeterValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy(self::GRAIN_TO_KG)->toFloat();
    }
}
