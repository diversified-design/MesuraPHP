<?php

declare(strict_types=1);

namespace Mesura\Area;

use Brick\Math\BigRational;
use Mesura\UnitSystem;

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

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::Metric;
    }
}
