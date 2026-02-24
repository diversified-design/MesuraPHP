<?php

declare(strict_types=1);

namespace Mesura\Torque;

use Mesura\MeasurementUnitInterface;

interface TorqueInterface extends MeasurementUnitInterface
{
    public static function fromNewtonMeterValue(float $value): static;

    public function toNewtonMeterValue(): float;
}
