<?php

declare(strict_types=1);

namespace Mesura\Weight;

use Mesura\MeasurementUnitInterface;

interface WeightInterface extends MeasurementUnitInterface
{
    public static function fromKilogramValue(float $value): static;

    public function toKilogramValue(): float;
}
