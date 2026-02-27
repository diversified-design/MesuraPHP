<?php

declare(strict_types=1);

namespace Mesura\Generic;

use Mesura\MeasurementUnit;
use Mesura\UnitSystem;

class SimpleMeasurement extends MeasurementUnit
{
    protected static string $defaultSymbol = '';

    public static function fromValue(float $value, ?string $symbol = null): static
    {
        return new static($value, $symbol);
    }

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::Other;
    }
}
