<?php

declare(strict_types=1);

namespace MeasurementUnit\Area;

use MeasurementUnit\MeasurementUnitInterface;

interface AreaInterface extends MeasurementUnitInterface
{
    public static function fromSquareMeterValue(float $value): self;

    public function toSquareMeterValue(): float;
}
