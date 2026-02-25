<?php

declare(strict_types=1);

namespace Mesura\Power;

use Brick\Math\BigRational;
use Mesura\UnitSystem;

class Horsepower extends Power
{
    protected static string $defaultSymbol = 'hp';

    /** 1 mechanical horsepower = 745.69987158227022 W */
    private const WATTS_PER_HP = '745.69987158227022';

    public static function fromWattValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy(self::WATTS_PER_HP)->toFloat()
        );
    }

    public function toWattValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy(self::WATTS_PER_HP)->toFloat();
    }

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::Imperial;
    }
}
