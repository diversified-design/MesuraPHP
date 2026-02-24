<?php

declare(strict_types=1);

namespace Mesura\Time;

use Mesura\MeasurementUnitInterface;

interface TimeInterface extends MeasurementUnitInterface
{
    public static function fromSecondValue(float $value): static;

    public function toSecondValue(): float;
}
