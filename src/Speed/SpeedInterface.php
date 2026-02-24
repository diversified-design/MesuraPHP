<?php

declare(strict_types=1);

namespace MeasurementUnit\Speed;

use MeasurementUnit\MeasurementUnitInterface;

interface SpeedInterface extends MeasurementUnitInterface
{
    public static function fromMeterPerSecondValue(float $value): static;

    public function toMeterPerSecondValue(): float;
}
