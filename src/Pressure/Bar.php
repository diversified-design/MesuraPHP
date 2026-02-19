<?php
declare(strict_types=1);

namespace MeasurementUnit\Pressure;

use Brick\Math\BigRational;

class Bar extends Pressure
{
    protected static string $defaultSymbol = 'bar';

    public static function fromPascalValue(float $value): self
    {
        return new self(
            BigRational::of($value)->dividedBy('100000')->toFloat()
        );
    }

    public function toPascalValue(): float
    {
        return BigRational::of($this->value)->multipliedBy('100000')->toFloat();
    }
}
