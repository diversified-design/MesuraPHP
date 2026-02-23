<?php

declare(strict_types=1);

namespace MeasurementUnit\Length;

use Brick\Math\BigRational;

class Thou extends Length
{
    protected static string $defaultSymbol = 'thou';

    public static function fromMeterValue(float $value): self
    {
        return new self(
            BigRational::of((string) $value)->dividedBy('0.0000254')->toFloat()
        );
    }

    public function toMeterValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy('0.0000254')->toFloat();
    }
}
