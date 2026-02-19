<?php
declare(strict_types=1);

namespace MeasurementUnit\Pressure;

use Brick\Math\BigRational;

class PoundPerSquareInch extends Pressure
{
    protected static string $defaultSymbol = 'psi';

    public static function fromPascalValue(float $value): self
    {
        return new self(
            BigRational::of($value)->dividedBy('6894.757293168')->toFloat()
        );
    }

    public function toPascalValue(): float
    {
        return BigRational::of($this->value)->multipliedBy('6894.757293168')->toFloat();
    }
}
