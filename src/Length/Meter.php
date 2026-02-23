<?php

declare(strict_types=1);

namespace MeasurementUnit\Length;

class Meter extends Length
{
    protected static string $defaultSymbol = 'm';

    public static function fromMeterValue(float $value): self
    {
        return new self($value);
    }

    public function toMeterValue(): float
    {
        return $this->value;
    }
}
