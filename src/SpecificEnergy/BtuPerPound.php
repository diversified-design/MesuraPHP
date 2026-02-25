<?php

declare(strict_types=1);

namespace Mesura\SpecificEnergy;

use Brick\Math\BigRational;

class BtuPerPound extends SpecificEnergy
{
    protected static string $defaultSymbol = 'BTU/lb';

    /** 1 BTU = 1055.05585262 J (ISO 31-4) */
    private const JOULES_PER_BTU = '1055.05585262';

    /** 1 lb = 0.45359237 kg (exact) */
    private const KG_PER_POUND = '0.45359237';

    public static function fromJoulePerKilogramValue(float $value): static
    {
        // BTU/lb = (J/kg) * (kg/lb) / (J/BTU)
        return new static(
            BigRational::of((string) $value)
                ->multipliedBy(self::KG_PER_POUND)
                ->dividedBy(self::JOULES_PER_BTU)
                ->toFloat()
        );
    }

    public function toJoulePerKilogramValue(): float
    {
        // J/kg = (BTU/lb) * (J/BTU) / (kg/lb)
        return BigRational::of((string) $this->value)
            ->multipliedBy(self::JOULES_PER_BTU)
            ->dividedBy(self::KG_PER_POUND)
            ->toFloat()
        ;
    }
}
