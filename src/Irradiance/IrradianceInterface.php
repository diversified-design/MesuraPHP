<?php

declare(strict_types=1);

namespace Mesura\Irradiance;

use Mesura\MeasurementUnitInterface;

interface IrradianceInterface extends MeasurementUnitInterface
{
    public static function fromWattPerSquareMeterValue(float $value): static;

    public function toWattPerSquareMeterValue(): float;
}
