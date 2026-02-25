<?php

declare(strict_types=1);

namespace Mesura\Volume;

use Brick\Math\BigRational;
use Mesura\UnitSystem;

class CubicYard extends Volume
{
    protected static string $defaultSymbol = 'yd³';

    public static function fromCubicMeterValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy('0.764555')->toFloat()
        );
    }

    public function toCubicMeterValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy('0.764555')->toFloat();
    }

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::Imperial;
    }
}
