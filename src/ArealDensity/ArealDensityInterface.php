<?php

declare(strict_types=1);

namespace Mesura\ArealDensity;

use Mesura\MeasurementUnitInterface;

interface ArealDensityInterface extends MeasurementUnitInterface
{
    public static function fromKilogramPerSquareMeterValue(float $value): static;

    public function toKilogramPerSquareMeterValue(): float;
}
