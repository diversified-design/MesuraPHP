<?php

declare(strict_types=1);

namespace Mesura\Length;

use Mesura\MeasurementUnitInterface;

interface LengthInterface extends MeasurementUnitInterface
{
    public static function fromMeterValue(float $value): static;

    public function toMeterValue(): float;
}
