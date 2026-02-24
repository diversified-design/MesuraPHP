<?php

declare(strict_types=1);

namespace MeasurementUnit\Area;

use Brick\Math\BigRational;

class SquareMile extends Area
{
    protected static string $defaultSymbol = 'mi²';

    public static function fromSquareMeterValue(float $value): self
    {
        return new self(
            BigRational::of((string) $value)->dividedBy('2589988.110336')->toFloat()
        );
    }

    public function toSquareMeterValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy('2589988.110336')->toFloat();
    }
}
