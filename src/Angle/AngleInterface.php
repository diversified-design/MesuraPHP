<?php

declare(strict_types=1);

namespace Mesura\Angle;

use Mesura\MeasurementUnitInterface;

interface AngleInterface extends MeasurementUnitInterface
{
    public static function fromRadianValue(float $value): static;

    public function toRadianValue(): float;
}
