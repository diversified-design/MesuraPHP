<?php

declare(strict_types=1);

namespace Mesura\Weight;

use Brick\Math\BigRational;

class MetricTon extends Weight
{
    protected static string $defaultSymbol = 't';

    public static function fromKilogramValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy('1000')->toFloat()
        );
    }

    public function toKilogramValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy('1000')->toFloat();
    }
}
