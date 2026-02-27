<?php

declare(strict_types=1);

namespace Mesura\Torque;

use Mesura\BaseMeasurementUnit;

abstract class Torque extends BaseMeasurementUnit implements TorqueInterface
{
    public function toNewtonMeter(): NewtonMeter
    {
        return $this->toUnit(NewtonMeter::class);
    }

    /**
     * @template T of Torque
     *
     * @param class-string<T> $fqn
     *
     * @return T
     */
    public function toUnit(string $fqn): Torque
    {
        return $fqn::fromNewtonMeterValue($this->toNewtonMeterValue());
    }
}
