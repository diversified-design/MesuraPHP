<?php

declare(strict_types=1);

namespace Mesura\SpecificEnergy;

use Mesura\UnitSystem;

class JoulePerKilogram extends SpecificEnergy
{
    protected static string $defaultSymbol = 'J/kg';

    public static function fromJoulePerKilogramValue(float $value): static
    {
        return new static($value);
    }

    public function toJoulePerKilogramValue(): float
    {
        return $this->value;
    }

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::SI;
    }
}
