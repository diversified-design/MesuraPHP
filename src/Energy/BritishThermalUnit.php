<?php

declare(strict_types=1);

namespace Mesura\Energy;

use Brick\Math\BigRational;
use Mesura\UnitSystem;

class BritishThermalUnit extends Energy
{
    protected static string $defaultSymbol = 'BTU';

    /** 1 BTU = 1055.05585262 J (ISO 31-4) */
    private const JOULES_PER_BTU = '1055.05585262';

    public static function fromJouleValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy(self::JOULES_PER_BTU)->toFloat()
        );
    }

    public function toJouleValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy(self::JOULES_PER_BTU)->toFloat();
    }

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::Imperial;
    }
}
