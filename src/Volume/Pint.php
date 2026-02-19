<?php
declare(strict_types=1);

namespace MeasurementUnit\Volume;

use Brick\Math\BigRational;

class Pint extends Volume
{
    protected static string $defaultSymbol = 'pt';

    public static function fromCubicMeterValue(float $value): self
    {
        return new self(
            BigRational::of($value)->dividedBy('0.000473176')->toFloat()
        );
    }

    public function toCubicMeterValue(): float
    {
        return BigRational::of($this->value)->multipliedBy('0.000473176')->toFloat();
    }
}
