<?php
declare(strict_types=1);

namespace MeasurementUnit\Pressure;

use MeasurementUnit\MeasurementUnit;
use MeasurementUnit\MeasurementUnitInterface;

interface PressureInterface extends MeasurementUnitInterface
{
    public static function fromPascalValue(float $value): self;

    public function toPascalValue(): float;
}
