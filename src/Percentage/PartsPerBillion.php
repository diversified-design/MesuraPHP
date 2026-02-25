<?php

declare(strict_types=1);

namespace Mesura\Percentage;

use Brick\Math\BigRational;

class PartsPerBillion extends Percentage
{
    protected static string $defaultSymbol = 'ppb';

    public static function fromRatioValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->multipliedBy(1_000_000_000)->toFloat()
        );
    }

    public function toRatioValue(): float
    {
        return BigRational::of((string) $this->value)->dividedBy(1_000_000_000)->toFloat();
    }
}
