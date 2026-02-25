<?php

declare(strict_types=1);

namespace Mesura\Temperature;

use Brick\Math\BigRational;
use Mesura\UnitSystem;

class Rankine extends Temperature
{
    protected static string $defaultSymbol = '°R';

    public static function fromKelvinValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy(5)->multipliedBy(9)->toFloat()
        );
    }

    public function toKelvinValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy(5)->dividedBy(9)->toFloat();
    }

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::Other;
    }
}
