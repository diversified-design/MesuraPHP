<?php

declare(strict_types=1);

namespace Mesura\ArealDensity;

use Brick\Math\BigRational;

class PoundPerSquareFoot extends ArealDensity
{
    protected static string $defaultSymbol = 'lb/ft²';

    /** 1 lb = 0.45359237 kg (exact) */
    private const KG_PER_LB = '0.45359237';

    /** 1 ft² = 0.09290304 m² (exact, 0.3048² m²) */
    private const SQ_M_PER_SQ_FT = '0.09290304';

    public static function fromKilogramPerSquareMeterValue(float $value): static
    {
        // lb/ft² = (kg/m²) * (m²/ft²) / (kg/lb)
        return new static(
            BigRational::of((string) $value)
                ->multipliedBy(self::SQ_M_PER_SQ_FT)
                ->dividedBy(self::KG_PER_LB)
                ->toFloat()
        );
    }

    public function toKilogramPerSquareMeterValue(): float
    {
        // kg/m² = (lb/ft²) * (kg/lb) / (m²/ft²)
        return BigRational::of((string) $this->value)
            ->multipliedBy(self::KG_PER_LB)
            ->dividedBy(self::SQ_M_PER_SQ_FT)
            ->toFloat();
    }
}
