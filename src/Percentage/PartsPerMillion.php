<?php

declare(strict_types=1);

namespace Mesura\Percentage;

use Brick\Math\BigRational;
use Mesura\UnitSystem;

class PartsPerMillion extends Percentage
{
    protected static string $defaultSymbol = 'ppm';

    public static function fromRatioValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->multipliedBy(1_000_000)->toFloat()
        );
    }

    public function toRatioValue(): float
    {
        return BigRational::of((string) $this->value)->dividedBy(1_000_000)->toFloat();
    }

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::Dimensionless;
    }
}
