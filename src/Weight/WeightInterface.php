<?php

declare(strict_types=1);

namespace MeasurementUnit\Weight;

use MeasurementUnit\MeasurementUnitInterface;

interface WeightInterface extends MeasurementUnitInterface
{
    public static function fromKilogramValue(float $value): self;

    public function toKilogramValue(): float;
}
