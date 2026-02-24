<?php

declare(strict_types=1);

namespace Mesura\Length;

class Meter extends Length
{
    protected static string $defaultSymbol = 'm';

    public static function fromMeterValue(float $value): static
    {
        return new static($value);
    }

    public function toMeterValue(): float
    {
        return $this->value;
    }
}
