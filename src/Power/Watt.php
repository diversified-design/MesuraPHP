<?php

declare(strict_types=1);

namespace Mesura\Power;

use Mesura\UnitSystem;

class Watt extends Power
{
    protected static string $defaultSymbol = 'W';

    public static function fromWattValue(float $value): static
    {
        return new static($value);
    }

    public function toWattValue(): float
    {
        return $this->value;
    }

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::SI;
    }
}
