<?php

declare(strict_types=1);

namespace Mesura\Speed;

use Mesura\MeasurementUnitInterface;

interface SpeedInterface extends MeasurementUnitInterface
{
    public static function fromMeterPerSecondValue(float $value): static;

    public function toMeterPerSecondValue(): float;
}
