<?php

declare(strict_types=1);

namespace MeasurementUnit\Pressure;

use Brick\Math\BigRational;

class Kilopascal extends Pressure
{
    protected static string $defaultSymbol = 'kPa';

    public static function fromPascalValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy('1000')->toFloat()
        );
    }

    public function toPascalValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy('1000')->toFloat();
    }
}
