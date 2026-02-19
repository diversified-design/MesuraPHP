<?php
declare(strict_types=1);

namespace MeasurementUnit\Volume;

use Brick\Math\BigRational;

class FluidDram extends Volume
{
    protected static string $defaultSymbol = 'fl dr';

    public static function fromCubicMeterValue(float $value): self
    {
        return new self(
            BigRational::of($value)->dividedBy('0.0000036966912')->toFloat()
        );
    }

    public function toCubicMeterValue(): float
    {
        return BigRational::of($this->value)->multipliedBy('0.0000036966912')->toFloat();
    }
}
