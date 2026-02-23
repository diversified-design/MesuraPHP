<?php

declare(strict_types=1);

namespace MeasurementUnit\Time;

class Second extends Time
{
    protected static string $defaultSymbol = 's';

    public static function fromSecondValue(float $value): self
    {
        return new self($value);
    }

    public function toSecondValue(): float
    {
        return $this->value;
    }
}
