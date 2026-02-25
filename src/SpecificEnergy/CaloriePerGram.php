<?php

declare(strict_types=1);

namespace Mesura\SpecificEnergy;

use Brick\Math\BigRational;
use Mesura\UnitSystem;

class CaloriePerGram extends SpecificEnergy
{
    protected static string $defaultSymbol = 'cal/g';

    /** 1 cal/g = 4184 J/kg (1 cal = 4.184 J, 1 g = 0.001 kg) */
    private const JOULES_PER_KG = '4184';

    public static function fromJoulePerKilogramValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy(self::JOULES_PER_KG)->toFloat()
        );
    }

    public function toJoulePerKilogramValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy(self::JOULES_PER_KG)->toFloat();
    }

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::Metric;
    }
}
