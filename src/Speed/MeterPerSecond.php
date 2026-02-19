<?php
declare(strict_types=1);

namespace MeasurementUnit\Speed;

class MeterPerSecond extends Speed
{
    protected static string $defaultSymbol = 'm/s';

    public static function fromMeterPerSecondValue(float $value): self
    {
        return new self($value);
    }

    public function toMeterPerSecondValue(): float
    {
        return $this->value;
    }
}
