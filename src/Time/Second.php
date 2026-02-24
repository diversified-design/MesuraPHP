<?php

declare(strict_types=1);

namespace Mesura\Time;

class Second extends Time
{
    protected static string $defaultSymbol = 's';

    public static function fromSecondValue(float $value): static
    {
        return new static($value);
    }

    public function toSecondValue(): float
    {
        return $this->value;
    }
}
