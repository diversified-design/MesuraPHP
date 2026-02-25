<?php

declare(strict_types=1);

namespace Mesura\ArealDensity;

use Brick\Math\BigRational;

class GramPerSquareMeter extends ArealDensity
{
    protected static string $defaultSymbol = 'g/m²';

    public static function fromKilogramPerSquareMeterValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->multipliedBy(1000)->toFloat()
        );
    }

    public function toKilogramPerSquareMeterValue(): float
    {
        return BigRational::of((string) $this->value)->dividedBy(1000)->toFloat();
    }
}
