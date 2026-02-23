<?php

declare(strict_types=1);

namespace MeasurementUnit\Pressure;

use Brick\Math\BigRational;

class Millibar extends Pressure
{
    protected static string $defaultSymbol = 'mbar';

    public static function fromPascalValue(float $value): self
    {
        return new self(
            BigRational::of((string) $value)->dividedBy('100')->toFloat()
        );
    }

    public function toPascalValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy('100')->toFloat();
    }
}
