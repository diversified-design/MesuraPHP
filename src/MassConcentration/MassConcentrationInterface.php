<?php

declare(strict_types=1);

namespace Mesura\MassConcentration;

use Mesura\MeasurementUnitInterface;

interface MassConcentrationInterface extends MeasurementUnitInterface
{
    public static function fromKilogramPerCubicMeterValue(float $value): static;

    public function toKilogramPerCubicMeterValue(): float;
}
