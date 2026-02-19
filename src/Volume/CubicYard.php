<?php
declare(strict_types=1);

namespace MeasurementUnit\Volume;

use Brick\Math\BigRational;

class CubicYard extends Volume
{
    protected static string $defaultSymbol = 'yd³';

    public static function fromCubicMeterValue(float $value): self
    {
        return new self(
            BigRational::of((string) $value)->dividedBy('0.764555')->toFloat()
        );
    }

    public function toCubicMeterValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy('0.764555')->toFloat();
    }
}
