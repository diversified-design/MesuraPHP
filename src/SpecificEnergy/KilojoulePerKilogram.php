<?php

declare(strict_types=1);

namespace Mesura\SpecificEnergy;

use Brick\Math\BigRational;
use Mesura\UnitSystem;

class KilojoulePerKilogram extends SpecificEnergy
{
    protected static string $defaultSymbol = 'kJ/kg';

    public static function fromJoulePerKilogramValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy(1000)->toFloat()
        );
    }

    public function toJoulePerKilogramValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy(1000)->toFloat();
    }

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::SI;
    }
}
