<?php

declare(strict_types=1);

namespace MeasurementUnit\Temperature;

use Brick\Math\BigRational;

class Celsius extends Temperature
{
    protected static string $defaultSymbol = '°C';

    public static function fromKelvinValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->minus('273.15')->toFloat()
        );
    }

    public function toKelvinValue(): float
    {
        return BigRational::of((string) $this->value)->plus('273.15')->toFloat();
    }
}
