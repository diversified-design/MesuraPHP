<?php

declare(strict_types=1);

namespace Mesura\Power;

use Brick\Math\BigRational;
use Mesura\UnitSystem;

class CaloriePerSecond extends Power
{
    protected static string $defaultSymbol = 'cal/s';

    /** 1 cal/s = 4.184 W (exact, thermochemical calorie) */
    private const WATTS_PER_CAL_S = '4.184';

    public static function fromWattValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy(self::WATTS_PER_CAL_S)->toFloat()
        );
    }

    public function toWattValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy(self::WATTS_PER_CAL_S)->toFloat();
    }

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::Metric;
    }
}
