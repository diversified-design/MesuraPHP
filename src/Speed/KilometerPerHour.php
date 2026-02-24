<?php

declare(strict_types=1);

namespace MeasurementUnit\Speed;

use Brick\Math\BigRational;

class KilometerPerHour extends Speed
{
    protected static string $defaultSymbol = 'km/h';

    public static function fromMeterPerSecondValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy('0.277778')->toFloat()
        );
    }

    public function toMeterPerSecondValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy('0.277778')->toFloat();
    }
}
