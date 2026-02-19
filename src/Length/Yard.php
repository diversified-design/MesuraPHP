<?php
declare(strict_types=1);

namespace MeasurementUnit\Length;

use Brick\Math\BigRational;

class Yard extends Length
{
    protected static string $defaultSymbol = 'yd';

    public static function fromMeterValue(float $value): self
    {
        return new self(
            BigRational::of($value)->dividedBy('0.9144')->toFloat()
        );
    }

    public function toMeterValue(): float
    {
        return BigRational::of($this->value)->multipliedBy('0.9144')->toFloat();
    }
}
