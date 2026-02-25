<?php

declare(strict_types=1);

namespace Mesura\Irradiance;

class WattPerSquareMeter extends Irradiance
{
    protected static string $defaultSymbol = 'W/m²';

    public static function fromWattPerSquareMeterValue(float $value): static
    {
        return new static($value);
    }

    public function toWattPerSquareMeterValue(): float
    {
        return $this->value;
    }
}
