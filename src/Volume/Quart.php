<?php
declare(strict_types=1);

namespace MeasurementUnit\Volume;

use Brick\Math\BigRational;

class Quart extends Volume
{
    protected static string $defaultSymbol = 'qt';

    public static function fromCubicMeterValue(float $value): self
    {
        return new self(
            BigRational::of($value)->dividedBy('0.000946353')->toFloat()
        );
    }

    public function toCubicMeterValue(): float
    {
        return BigRational::of($this->value)->multipliedBy('0.000946353')->toFloat();
    }
}
