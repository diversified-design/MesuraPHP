<?php

declare(strict_types=1);

namespace Mesura\MassConcentration;

use Brick\Math\BigRational;
use Mesura\UnitSystem;

class GramPerCubicMeter extends MassConcentration
{
    protected static string $defaultSymbol = 'g/m³';

    public static function fromKilogramPerCubicMeterValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->multipliedBy(1000)->toFloat()
        );
    }

    public function toKilogramPerCubicMeterValue(): float
    {
        return BigRational::of((string) $this->value)->dividedBy(1000)->toFloat();
    }

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::Metric;
    }
}
