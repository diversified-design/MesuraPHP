<?php

declare(strict_types=1);

namespace MeasurementUnit\Area;

use Brick\Math\BigRational;

class Acre extends Area
{
    protected static string $defaultSymbol = 'ac';

    public static function fromSquareMeterValue(float $value): self
    {
        return new self(
            BigRational::of((string) $value)->dividedBy('4046.8564224')->toFloat()
        );
    }

    public function toSquareMeterValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy('4046.8564224')->toFloat();
    }
}
