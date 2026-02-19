<?php
declare(strict_types=1);

namespace MeasurementUnit\Weight;

class Kilogram extends Weight
{
    protected static string $defaultSymbol = 'kg';

    public static function fromKilogramValue(float $value): self
    {
        return new self($value);
    }

    public function toKilogramValue(): float
    {
        return $this->value;
    }
}
