<?php

declare(strict_types=1);

namespace MeasurementUnit\Volume;

class CubicMeter extends Volume
{
    protected static string $defaultSymbol = 'm³';

    public static function fromCubicMeterValue(float $value): static
    {
        return new static($value);
    }

    public function toCubicMeterValue(): float
    {
        return $this->value;
    }
}
