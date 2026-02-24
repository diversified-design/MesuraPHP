<?php

declare(strict_types=1);

namespace MeasurementUnit\Temperature;

class Kelvin extends Temperature
{
    protected static string $defaultSymbol = 'K';

    public static function fromKelvinValue(float $value): static
    {
        return new static($value);
    }

    public function toKelvinValue(): float
    {
        return $this->value;
    }
}
