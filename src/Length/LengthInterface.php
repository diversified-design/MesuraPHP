<?php

declare(strict_types=1);

namespace MeasurementUnit\Length;

use MeasurementUnit\MeasurementUnitInterface;

interface LengthInterface extends MeasurementUnitInterface
{
    public static function fromMeterValue(float $value): static;

    public function toMeterValue(): float;
}
