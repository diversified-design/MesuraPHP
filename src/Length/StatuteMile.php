<?php

declare(strict_types=1);

namespace Mesura\Length;

use Brick\Math\BigRational;

class StatuteMile extends Length
{
    protected static string $defaultSymbol = 'mi';

    public static function fromMeterValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy('1609.344')->toFloat()
        );
    }

    public function toMeterValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy('1609.344')->toFloat();
    }
}
