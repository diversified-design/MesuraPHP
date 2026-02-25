<?php

declare(strict_types=1);

namespace Mesura\Percentage;

use Brick\Math\BigRational;
use Mesura\UnitSystem;

class Percent extends Percentage
{
    protected static string $defaultSymbol = '%';

    public static function fromRatioValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->multipliedBy(100)->toFloat()
        );
    }

    public function toRatioValue(): float
    {
        return BigRational::of((string) $this->value)->dividedBy(100)->toFloat();
    }

    /**
     * Returns the percentage as a decimal ratio.
     * Example: 75% => 0.75 (unitless).
     */
    public function toDecimal(): float
    {
        return $this->toRatioValue();
    }

    /**
     * Returns a multiplicative coefficient.
     * Example: 15% => 1.15 (unitless)
     * Can be useful when representing increase/decrease.
     */
    public function toCoefficient(): float
    {
        return 1 + $this->toRatioValue();
    }

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::Dimensionless;
    }
}
