<?php

declare(strict_types=1);

namespace MeasurementUnit\Area;

use Brick\Math\BigRational;

class Hectare extends Area
{
    protected static string $defaultSymbol = 'ha';

    public static function fromSquareMeterValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy('10000')->toFloat()
        );
    }

    public function toSquareMeterValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy('10000')->toFloat();
    }
}
