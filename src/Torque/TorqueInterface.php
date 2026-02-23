<?php

declare(strict_types=1);

namespace MeasurementUnit\Torque;

use MeasurementUnit\MeasurementUnitInterface;

interface TorqueInterface extends MeasurementUnitInterface
{
    public static function fromNewtonMeterValue(float $value): self;

    public function toNewtonMeterValue(): float;
}
