<?php

declare(strict_types=1);

namespace Mesura\ArealDensity;

use Brick\Math\BigRational;
use Mesura\UnitSystem;

class OuncePerSquareYard extends ArealDensity
{
    protected static string $defaultSymbol = 'oz/yd²';

    /** 1 oz = 0.028349523125 kg (avoirdupois, exact) */
    private const KG_PER_OZ = '0.028349523125';

    /** 1 yd² = 0.83612736 m² (exact, 0.9144² m²) */
    private const SQ_M_PER_SQ_YD = '0.83612736';

    public static function fromKilogramPerSquareMeterValue(float $value): static
    {
        // oz/yd² = (kg/m²) * (m²/yd²) / (kg/oz)
        return new static(
            BigRational::of((string) $value)
                ->multipliedBy(self::SQ_M_PER_SQ_YD)
                ->dividedBy(self::KG_PER_OZ)
                ->toFloat()
        );
    }

    public function toKilogramPerSquareMeterValue(): float
    {
        // kg/m² = (oz/yd²) * (kg/oz) / (m²/yd²)
        return BigRational::of((string) $this->value)
            ->multipliedBy(self::KG_PER_OZ)
            ->dividedBy(self::SQ_M_PER_SQ_YD)
            ->toFloat()
        ;
    }

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::Imperial;
    }
}
