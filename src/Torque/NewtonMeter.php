<?php

declare(strict_types=1);

namespace Mesura\Torque;

class NewtonMeter extends Torque
{
    protected static string $defaultSymbol = 'N⋅m';

    public static function fromNewtonMeterValue(float $value): static
    {
        return new static($value);
    }

    public function toNewtonMeterValue(): float
    {
        return $this->value;
    }
}
