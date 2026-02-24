<?php

declare(strict_types=1);

namespace Mesura\Pressure;

use Mesura\MeasurementUnitInterface;

interface PressureInterface extends MeasurementUnitInterface
{
    public static function fromPascalValue(float $value): static;

    public function toPascalValue(): float;
}
