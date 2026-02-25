<?php

declare(strict_types=1);

namespace Mesura\Area;

use Brick\Math\BigRational;
use Mesura\UnitSystem;

class SquareFoot extends Area
{
    protected static string $defaultSymbol = 'ft²';

    public static function fromSquareMeterValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy('0.09290304')->toFloat()
        );
    }

    public function toSquareMeterValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy('0.09290304')->toFloat();
    }

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::Imperial;
    }
}
