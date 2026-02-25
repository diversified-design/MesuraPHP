<?php

declare(strict_types=1);

namespace Mesura\Energy;

use Brick\Math\BigRational;

class Calorie extends Energy
{
    protected static string $defaultSymbol = 'cal';

    /** 1 thermochemical calorie = 4.184 J (exact) */
    private const JOULES_PER_CALORIE = '4.184';

    public static function fromJouleValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy(self::JOULES_PER_CALORIE)->toFloat()
        );
    }

    public function toJouleValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy(self::JOULES_PER_CALORIE)->toFloat();
    }
}
