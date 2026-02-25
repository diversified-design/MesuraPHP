<?php

declare(strict_types=1);

namespace Mesura\Length;

use Mesura\UnitSystem;

class Meter extends Length
{
    protected static string $defaultSymbol = 'm';

    public static function fromMeterValue(float $value): static
    {
        return new static($value);
    }

    public function toMeterValue(): float
    {
        return $this->value;
    }

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::SI;
    }
}
