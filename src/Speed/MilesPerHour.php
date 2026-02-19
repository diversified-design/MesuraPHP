<?php
declare(strict_types=1);

namespace MeasurementUnit\Speed;

use Brick\Math\BigRational;

class MilesPerHour extends Speed
{
    protected static string $defaultSymbol = 'mph';

    public static function fromMeterPerSecondValue(float $value): self
    {
        return new self(
            BigRational::of($value)->dividedBy('0.44704')->toFloat()
        );
    }

    public function toMeterPerSecondValue(): float
    {
        return BigRational::of($this->value)->multipliedBy('0.44704')->toFloat();
    }
}
