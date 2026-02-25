<?php

declare(strict_types=1);

namespace Mesura\MassConcentration;

class KilogramPerCubicMeter extends MassConcentration
{
    protected static string $defaultSymbol = 'kg/m³';

    public static function fromKilogramPerCubicMeterValue(float $value): static
    {
        return new static($value);
    }

    public function toKilogramPerCubicMeterValue(): float
    {
        return $this->value;
    }
}
