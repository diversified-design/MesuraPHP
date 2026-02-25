<?php

declare(strict_types=1);

namespace Mesura\Energy;

use Brick\Math\BigRational;
use Mesura\UnitSystem;

class KilowattHour extends Energy
{
    protected static string $defaultSymbol = 'kWh';

    /** 1 kWh = 3,600,000 J (exact) */
    private const JOULES_PER_KILOWATT_HOUR = '3600000';

    public static function fromJouleValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy(self::JOULES_PER_KILOWATT_HOUR)->toFloat()
        );
    }

    public function toJouleValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy(self::JOULES_PER_KILOWATT_HOUR)->toFloat();
    }

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::Metric;
    }
}
