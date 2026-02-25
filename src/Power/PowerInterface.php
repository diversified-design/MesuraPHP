<?php

declare(strict_types=1);

namespace Mesura\Power;

use Mesura\MeasurementUnitInterface;

interface PowerInterface extends MeasurementUnitInterface
{
    public static function fromWattValue(float $value): static;

    public function toWattValue(): float;
}
