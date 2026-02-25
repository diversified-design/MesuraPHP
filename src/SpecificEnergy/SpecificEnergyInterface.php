<?php

declare(strict_types=1);

namespace Mesura\SpecificEnergy;

use Mesura\MeasurementUnitInterface;

interface SpecificEnergyInterface extends MeasurementUnitInterface
{
    public static function fromJoulePerKilogramValue(float $value): static;

    public function toJoulePerKilogramValue(): float;
}
