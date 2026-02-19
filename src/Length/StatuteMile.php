<?php
declare(strict_types=1);

namespace MeasurementUnit\Length;

use Brick\Math\BigRational;

class StatuteMile extends Length
{
    protected static string $defaultSymbol = 'mi';

    public static function fromMeterValue(float $value): self
    {
        return new self(
            BigRational::of($value)->dividedBy('1609.344')->toFloat()
        );
    }

    public function toMeterValue(): float
    {
        return BigRational::of($this->value)->multipliedBy('1609.344')->toFloat();
    }
}
