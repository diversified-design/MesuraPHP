<?php

declare(strict_types=1);

namespace Mesura\Pressure;

use Brick\Math\BigRational;

class Torr extends Pressure
{
    protected static string $defaultSymbol = 'Torr';

    public static function fromPascalValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy('133.322368421')->toFloat()
        );
    }

    public function toPascalValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy('133.322368421')->toFloat();
    }
}
