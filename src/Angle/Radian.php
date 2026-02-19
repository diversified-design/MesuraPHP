<?php
declare(strict_types=1);

namespace MeasurementUnit\Angle;

class Radian extends Angle
{
    protected static string $defaultSymbol = 'rad';

    public static function fromRadianValue(float $value): self
    {
        return new self($value);
    }

    public function toRadianValue(): float
    {
        return $this->value;
    }
}
