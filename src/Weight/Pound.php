<?php

declare(strict_types=1);

namespace MeasurementUnit\Weight;

use Brick\Math\BigRational;

class Pound extends Weight
{
    protected static string $defaultSymbol = 'lb';

    public static function fromKilogramValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy('0.453592')->toFloat()
        );
    }

    public function toKilogramValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy('0.453592')->toFloat();
    }
}
