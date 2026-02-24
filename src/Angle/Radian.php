<?php

declare(strict_types=1);

namespace Mesura\Angle;

class Radian extends Angle
{
    protected static string $defaultSymbol = 'rad';

    public static function fromRadianValue(float $value): static
    {
        return new static($value);
    }

    public function toRadianValue(): float
    {
        return $this->value;
    }
}
