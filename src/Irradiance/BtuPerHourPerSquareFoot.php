<?php

declare(strict_types=1);

namespace Mesura\Irradiance;

use Brick\Math\BigRational;
use Mesura\UnitSystem;

class BtuPerHourPerSquareFoot extends Irradiance
{
    protected static string $defaultSymbol = 'BTU/(h⋅ft²)';

    /** 1 BTU = 1055.05585262 J (ISO 31-4) */
    private const JOULES_PER_BTU = '1055.05585262';

    /** 1 hour = 3600 seconds */
    private const SECONDS_PER_HOUR = '3600';

    /** 1 ft² = 0.09290304 m² (exact, 0.3048² m²) */
    private const SQ_M_PER_SQ_FT = '0.09290304';

    public static function fromWattPerSquareMeterValue(float $value): static
    {
        // BTU/(h·ft²) = (W/m²) * 3600 * 0.09290304 / 1055.05585262
        return new static(
            BigRational::of((string) $value)
                ->multipliedBy(self::SECONDS_PER_HOUR)
                ->multipliedBy(self::SQ_M_PER_SQ_FT)
                ->dividedBy(self::JOULES_PER_BTU)
                ->toFloat()
        );
    }

    public function toWattPerSquareMeterValue(): float
    {
        // W/m² = BTU/(h·ft²) * 1055.05585262 / (3600 * 0.09290304)
        return BigRational::of((string) $this->value)
            ->multipliedBy(self::JOULES_PER_BTU)
            ->dividedBy(self::SECONDS_PER_HOUR)
            ->dividedBy(self::SQ_M_PER_SQ_FT)
            ->toFloat()
        ;
    }

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::Imperial;
    }
}
