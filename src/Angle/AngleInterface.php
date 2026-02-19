<?php
declare(strict_types=1);

namespace MeasurementUnit\Angle;

use MeasurementUnit\MeasurementUnitInterface;

interface AngleInterface extends MeasurementUnitInterface
{
    public static function fromRadianValue(float $value): self;

    public function toRadianValue(): float;
}
