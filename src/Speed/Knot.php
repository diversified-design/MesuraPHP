<?php

declare(strict_types=1);

namespace Mesura\Speed;

use Brick\Math\BigRational;
use Mesura\UnitSystem;

class Knot extends Speed
{
    protected static string $defaultSymbol = 'kn';

    public static function fromMeterPerSecondValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy('0.514444')->toFloat()
        );
    }

    public function toMeterPerSecondValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy('0.514444')->toFloat();
    }

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::Nautical;
    }
}
