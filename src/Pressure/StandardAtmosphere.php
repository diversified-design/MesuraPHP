<?php
declare(strict_types=1);

namespace MeasurementUnit\Pressure;

use Brick\Math\BigRational;

class StandardAtmosphere extends Pressure
{
    protected static string $defaultSymbol = 'atm';

    public static function fromPascalValue(float $value): self
    {
        return new self(
            BigRational::of($value)->dividedBy('101325')->toFloat()
        );
    }

    public function toPascalValue(): float
    {
        return BigRational::of($this->value)->multipliedBy('101325')->toFloat();
    }
}
