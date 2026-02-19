<?php
declare(strict_types=1);

namespace MeasurementUnit\Pressure;

use Brick\Math\BigRational;

class MillimetreOfMercury extends Pressure
{
    protected static string $defaultSymbol = 'mmHg';

    public static function fromPascalValue(float $value): self
    {
        return new self(
            BigRational::of((string) $value)->dividedBy('133.322387415')->toFloat()
        );
    }

    public function toPascalValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy('133.322387415')->toFloat();
    }
}
