<?php

declare(strict_types=1);

namespace Mesura\Energy;

use Brick\Math\BigRational;
use Mesura\UnitSystem;

class WattHour extends Energy
{
    protected static string $defaultSymbol = 'Wh';

    /** 1 Wh = 3600 J (exact) */
    private const JOULES_PER_WATT_HOUR = '3600';

    public static function fromJouleValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy(self::JOULES_PER_WATT_HOUR)->toFloat()
        );
    }

    public function toJouleValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy(self::JOULES_PER_WATT_HOUR)->toFloat();
    }

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::Metric;
    }
}
