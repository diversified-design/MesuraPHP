<?php

declare(strict_types=1);

namespace Mesura\SpecificEnergy;

use Brick\Math\BigRational;

class MegajoulePerKilogram extends SpecificEnergy
{
    protected static string $defaultSymbol = 'MJ/kg';

    public static function fromJoulePerKilogramValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy(1_000_000)->toFloat()
        );
    }

    public function toJoulePerKilogramValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy(1_000_000)->toFloat();
    }
}
