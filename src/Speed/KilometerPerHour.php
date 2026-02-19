<?php
declare(strict_types=1);

namespace MeasurementUnit\Speed;

use Brick\Math\BigRational;

class KilometerPerHour extends Speed
{
    protected static string $defaultSymbol = 'km/h';

    public static function fromMeterPerSecondValue(float $value): self
    {
        return new self(
            BigRational::of($value)->dividedBy('0.277778')->toFloat()
        );
    }

    public function toMeterPerSecondValue(): float
    {
        return BigRational::of($this->value)->multipliedBy('0.277778')->toFloat();
    }
}
