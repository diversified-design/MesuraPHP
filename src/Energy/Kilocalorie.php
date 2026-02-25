<?php

declare(strict_types=1);

namespace Mesura\Energy;

use Brick\Math\BigRational;
use Mesura\UnitSystem;

class Kilocalorie extends Energy
{
    protected static string $defaultSymbol = 'kcal';

    /** 1 kilocalorie = 4184 J (exact) */
    private const JOULES_PER_KILOCALORIE = '4184';

    public static function fromJouleValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy(self::JOULES_PER_KILOCALORIE)->toFloat()
        );
    }

    public function toJouleValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy(self::JOULES_PER_KILOCALORIE)->toFloat();
    }

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::Metric;
    }
}
