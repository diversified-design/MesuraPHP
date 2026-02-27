<?php

declare(strict_types=1);

namespace Mesura\Generic;

use Mesura\MeasurementUnit;
use Mesura\UnitSystem;

class SimpleMeasurementUnit extends MeasurementUnit
{
    protected static string $defaultSymbol = '';

    protected static ?UnitSystem $unitSystem = null;

    public static function fromValue(float $value, ?string $symbol = null, ?UnitSystem $unitSystem = null): static
    {
        if ($unitSystem !== null) {
            static::$unitSystem = $unitSystem;
        }

        return new static($value);
    }

    public static function defaultSymbol(): string
    {
        return static::$defaultSymbol;
    }

    public static function unitSystem(): UnitSystem
    {
        return (static::$unitSystem) ? static::$unitSystem : UnitSystem::Other;
    }
}
