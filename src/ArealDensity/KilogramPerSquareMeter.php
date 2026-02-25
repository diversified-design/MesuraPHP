<?php

declare(strict_types=1);

namespace Mesura\ArealDensity;

use Mesura\UnitSystem;

class KilogramPerSquareMeter extends ArealDensity
{
    protected static string $defaultSymbol = 'kg/m²';

    public static function fromKilogramPerSquareMeterValue(float $value): static
    {
        return new static($value);
    }

    public function toKilogramPerSquareMeterValue(): float
    {
        return $this->value;
    }

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::SI;
    }
}
