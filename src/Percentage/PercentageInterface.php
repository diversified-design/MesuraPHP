<?php

declare(strict_types=1);

namespace Mesura\Percentage;

use Mesura\MeasurementUnitInterface;

interface PercentageInterface extends MeasurementUnitInterface
{
    public static function fromRatioValue(float $value): static;

    public function toRatioValue(): float;
}
