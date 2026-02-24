<?php

declare(strict_types=1);

namespace Mesura\Volume;

use Brick\Math\BigRational;

class FluidDram extends Volume
{
    protected static string $defaultSymbol = 'fl dr';

    public static function fromCubicMeterValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy('0.0000036966912')->toFloat()
        );
    }

    public function toCubicMeterValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy('0.0000036966912')->toFloat();
    }
}
