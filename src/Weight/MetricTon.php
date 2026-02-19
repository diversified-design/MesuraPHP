<?php
declare(strict_types=1);

namespace MeasurementUnit\Weight;

use Brick\Math\BigRational;

class MetricTon extends Weight
{
    protected static string $defaultSymbol = 't';

    public static function fromKilogramValue(float $value): self
    {
        return new self(
            BigRational::of((string) $value)->dividedBy('1000')->toFloat()
        );
    }

    public function toKilogramValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy('1000')->toFloat();
    }
}
