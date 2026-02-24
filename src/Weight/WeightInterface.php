<?php

declare(strict_types=1);

namespace MeasurementUnit\Weight;

use MeasurementUnit\MeasurementUnitInterface;

interface WeightInterface extends MeasurementUnitInterface
{
    public static function fromKilogramValue(float $value): static;

    public function toKilogramValue(): float;
}
