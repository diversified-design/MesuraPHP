<?php

declare(strict_types=1);

namespace Mesura\Length;

use Brick\Math\BigRational;

class HorseLength extends Length
{
    protected static string $defaultSymbol = 'hl';

    public static function fromMeterValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy('2.4')->toFloat()
        );
    }

    public function toMeterValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy('2.4')->toFloat();
    }
}
