<?php
declare(strict_types=1);

namespace MeasurementUnit\Length;

use Brick\Math\BigRational;

class Fathom extends Length
{
    protected static string $defaultSymbol = 'ftm';

    public static function fromMeterValue(float $value): self
    {
        return new self(
            BigRational::of($value)->dividedBy('1.8288')->toFloat()
        );
    }

    public function toMeterValue(): float
    {
        return BigRational::of($this->value)->multipliedBy('1.8288')->toFloat();
    }
}
