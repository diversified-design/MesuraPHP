<?php

declare(strict_types=1);

namespace MeasurementUnit\Time;

use Brick\Math\BigRational;

class Minute extends Time
{
    protected static string $defaultSymbol = 'min';

    public static function fromSecondValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy('60')->toFloat()
        );
    }

    public function toSecondValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy('60')->toFloat();
    }
}
