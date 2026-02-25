<?php

declare(strict_types=1);

namespace Mesura\Length;

use Brick\Math\BigRational;
use Mesura\UnitSystem;

class Yard extends Length
{
    protected static string $defaultSymbol = 'yd';

    public static function fromMeterValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy('0.9144')->toFloat()
        );
    }

    public function toMeterValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy('0.9144')->toFloat();
    }

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::Imperial;
    }
}
