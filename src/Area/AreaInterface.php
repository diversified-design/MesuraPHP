<?php

declare(strict_types=1);

namespace Mesura\Area;

use Mesura\MeasurementUnitInterface;

interface AreaInterface extends MeasurementUnitInterface
{
    public static function fromSquareMeterValue(float $value): static;

    public function toSquareMeterValue(): float;
}
