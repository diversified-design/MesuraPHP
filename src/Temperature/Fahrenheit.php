<?php

declare(strict_types=1);

namespace MeasurementUnit\Temperature;

use Brick\Math\BigRational;

class Fahrenheit extends Temperature
{
    protected static string $defaultSymbol = '°F';

    public static function fromKelvinValue(float $value): self
    {
        return new self(
            BigRational::of((string) $value)->dividedBy(5)->multipliedBy(9)->minus('459.67')->toFloat()
        );
    }

    public function toKelvinValue(): float
    {
        return BigRational::of((string) $this->value)->plus('459.67')->multipliedBy(5)->dividedBy(9)->toFloat();
    }
}
