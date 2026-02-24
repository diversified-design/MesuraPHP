<?php

declare(strict_types=1);

namespace Mesura\Temperature;

use Brick\Math\BigRational;

class Fahrenheit extends Temperature
{
    protected static string $defaultSymbol = '°F';

    public static function fromKelvinValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy(5)->multipliedBy(9)->minus('459.67')->toFloat()
        );
    }

    public function toKelvinValue(): float
    {
        return BigRational::of((string) $this->value)->plus('459.67')->multipliedBy(5)->dividedBy(9)->toFloat();
    }
}
