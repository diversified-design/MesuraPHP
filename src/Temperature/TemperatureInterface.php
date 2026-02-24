<?php

declare(strict_types=1);

namespace MeasurementUnit\Temperature;

use MeasurementUnit\MeasurementUnitInterface;

interface TemperatureInterface extends MeasurementUnitInterface
{
    public static function fromKelvinValue(float $value): static;

    public function toKelvinValue(): float;
}
