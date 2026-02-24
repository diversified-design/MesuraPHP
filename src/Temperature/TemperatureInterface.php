<?php

declare(strict_types=1);

namespace Mesura\Temperature;

use Mesura\MeasurementUnitInterface;

interface TemperatureInterface extends MeasurementUnitInterface
{
    public static function fromKelvinValue(float $value): static;

    public function toKelvinValue(): float;
}
