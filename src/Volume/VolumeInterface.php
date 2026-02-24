<?php

declare(strict_types=1);

namespace Mesura\Volume;

use Mesura\MeasurementUnitInterface;

interface VolumeInterface extends MeasurementUnitInterface
{
    public static function fromCubicMeterValue(float $value): static;

    public function toCubicMeterValue(): float;
}
