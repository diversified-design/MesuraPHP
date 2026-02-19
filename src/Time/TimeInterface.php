<?php
declare(strict_types=1);

namespace MeasurementUnit\Time;

use MeasurementUnit\MeasurementUnit;
use MeasurementUnit\MeasurementUnitInterface;

interface TimeInterface extends MeasurementUnitInterface
{
    public static function fromSecondValue(float $value): self;

    public function toSecondValue(): float;
}
