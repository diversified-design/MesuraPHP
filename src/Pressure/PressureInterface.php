<?php

declare(strict_types=1);

namespace MeasurementUnit\Pressure;

use MeasurementUnit\MeasurementUnitInterface;

interface PressureInterface extends MeasurementUnitInterface
{
    public static function fromPascalValue(float $value): static;

    public function toPascalValue(): float;
}
