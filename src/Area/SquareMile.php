<?php

declare(strict_types=1);

namespace Mesura\Area;

use Brick\Math\BigRational;
use Mesura\UnitSystem;

class SquareMile extends Area
{
    protected static string $defaultSymbol = 'mi²';

    public static function fromSquareMeterValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy('2589988.110336')->toFloat()
        );
    }

    public function toSquareMeterValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy('2589988.110336')->toFloat();
    }

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::Imperial;
    }
}
