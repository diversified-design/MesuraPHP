<?php
declare(strict_types=1);

namespace MeasurementUnit\Pressure;

class Pascal extends Pressure
{
    protected static string $defaultSymbol = 'Pa';

    public static function fromPascalValue(float $value): self
    {
        return new self($value);
    }

    public function toPascalValue(): float
    {
        return $this->value;
    }
}
