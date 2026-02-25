<?php

declare(strict_types=1);

namespace Mesura\Time;

use Brick\Math\BigRational;
use Mesura\UnitSystem;

class Day extends Time
{
    protected static string $defaultSymbol = 'd';

    public static function fromSecondValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy('86400')->toFloat()
        );
    }

    public function toSecondValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy('86400')->toFloat();
    }

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::Other;
    }
}
