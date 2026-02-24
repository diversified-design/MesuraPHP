<?php

declare(strict_types=1);

namespace MeasurementUnit\Angle;

class Degree extends Angle
{
    protected static string $defaultSymbol = '°';

    public static function fromRadianValue(float $value): static
    {
        return new static(rad2deg($value));
    }

    public function toRadianValue(): float
    {
        return deg2rad($this->value);
    }
}
