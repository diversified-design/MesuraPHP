<?php

declare(strict_types=1);

namespace Mesura\Pressure;

use Brick\Math\BigRational;

class Bar extends Pressure
{
    protected static string $defaultSymbol = 'bar';

    public static function fromPascalValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy('100000')->toFloat()
        );
    }

    public function toPascalValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy('100000')->toFloat();
    }
}
