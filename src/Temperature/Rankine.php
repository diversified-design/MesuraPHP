<?php

declare(strict_types=1);

namespace MeasurementUnit\Temperature;

use Brick\Math\BigRational;

class Rankine extends Temperature
{
    protected static string $defaultSymbol = '°R';

    public static function fromKelvinValue(float $value): self
    {
        return new self(
            BigRational::of((string) $value)->dividedBy(5)->multipliedBy(9)->toFloat()
        );
    }

    public function toKelvinValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy(5)->dividedBy(9)->toFloat();
    }
}
