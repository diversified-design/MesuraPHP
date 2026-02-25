<?php

declare(strict_types=1);

namespace Mesura\Volume;

use Brick\Math\BigRational;
use Mesura\UnitSystem;

class Quart extends Volume
{
    protected static string $defaultSymbol = 'qt';

    public static function fromCubicMeterValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy('0.000946353')->toFloat()
        );
    }

    public function toCubicMeterValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy('0.000946353')->toFloat();
    }

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::USCustomary;
    }
}
