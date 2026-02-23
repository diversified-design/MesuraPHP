<?php

declare(strict_types=1);

namespace MeasurementUnit\Length;

use Brick\Math\BigRational;

class HorseLength extends Length
{
    protected static string $defaultSymbol = 'hl';

    public static function fromMeterValue(float $value): self
    {
        return new self(
            BigRational::of((string) $value)->dividedBy('2.4')->toFloat()
        );
    }

    public function toMeterValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy('2.4')->toFloat();
    }
}
