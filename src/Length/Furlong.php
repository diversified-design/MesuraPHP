<?php

declare(strict_types=1);

namespace Mesura\Length;

use Brick\Math\BigRational;
use Mesura\UnitSystem;

class Furlong extends Length
{
    protected static string $defaultSymbol = 'fur';

    public static function fromMeterValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy('201.1680')->toFloat()
        );
    }

    public function toMeterValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy('201.1680')->toFloat();
    }

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::Imperial;
    }
}
