<?php

declare(strict_types=1);

namespace Mesura\SpecificEnergy;

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
}
