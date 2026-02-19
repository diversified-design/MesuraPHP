<?php
declare(strict_types=1);

namespace MeasurementUnit\Volume;

use MeasurementUnit\MeasurementUnit;
use MeasurementUnit\MeasurementUnitInterface;

interface VolumeInterface extends MeasurementUnitInterface
{
    public static function fromCubicMeterValue(float $value): self;

    public function toCubicMeterValue(): float;
}
