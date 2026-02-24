<?php

declare(strict_types=1);

namespace MeasurementUnit\Area;

use Brick\Math\BigRational;

class SquareFoot extends Area
{
    protected static string $defaultSymbol = 'ft²';

    public static function fromSquareMeterValue(float $value): self
    {
        return new self(
            BigRational::of((string) $value)->dividedBy('0.09290304')->toFloat()
        );
    }

    public function toSquareMeterValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy('0.09290304')->toFloat();
    }
}
