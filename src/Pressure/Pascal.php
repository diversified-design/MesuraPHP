<?php

declare(strict_types=1);

namespace Mesura\Pressure;

use Mesura\UnitSystem;

class Pascal extends Pressure
{
    protected static string $defaultSymbol = 'Pa';

    public static function fromPascalValue(float $value): static
    {
        return new static($value);
    }

    public function toPascalValue(): float
    {
        return $this->value;
    }

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::SI;
    }
}
