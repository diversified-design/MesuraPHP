<?php

declare(strict_types=1);

namespace Mesura\MassConcentration;

use Brick\Math\BigRational;

class MilligramPerCubicMeter extends MassConcentration
{
    protected static string $defaultSymbol = 'mg/m³';

    public static function fromKilogramPerCubicMeterValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->multipliedBy(1_000_000)->toFloat()
        );
    }

    public function toKilogramPerCubicMeterValue(): float
    {
        return BigRational::of((string) $this->value)->dividedBy(1_000_000)->toFloat();
    }
}
