<?php

declare(strict_types=1);

namespace MeasurementUnit\Time;

use MeasurementUnit\MeasurementUnitInterface;

interface TimeInterface extends MeasurementUnitInterface
{
    public static function fromSecondValue(float $value): static;

    public function toSecondValue(): float;
}
