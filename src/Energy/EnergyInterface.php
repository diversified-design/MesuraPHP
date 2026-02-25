<?php

declare(strict_types=1);

namespace Mesura\Energy;

use Mesura\MeasurementUnitInterface;

interface EnergyInterface extends MeasurementUnitInterface
{
    public static function fromJouleValue(float $value): static;

    public function toJouleValue(): float;
}
