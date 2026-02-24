<?php

declare(strict_types=1);

namespace Mesura\Weight;

use Brick\Math\BigRational;

class Gram extends Weight
{
    protected static string $defaultSymbol = 'g';

    public static function fromKilogramValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy('0.001')->toFloat()
        );
    }

    public function toKilogramValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy('0.001')->toFloat();
    }
}
