<?php

declare(strict_types=1);

namespace Mesura\Speed;

use Mesura\UnitSystem;

class MeterPerSecond extends Speed
{
    protected static string $defaultSymbol = 'm/s';

    public static function fromMeterPerSecondValue(float $value): static
    {
        return new static($value);
    }

    public function toMeterPerSecondValue(): float
    {
        return $this->value;
    }

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::SI;
    }
}
