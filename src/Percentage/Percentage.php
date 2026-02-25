<?php

declare(strict_types=1);

namespace Mesura\Percentage;

use Mesura\MeasurementUnit;

abstract class Percentage extends MeasurementUnit implements PercentageInterface
{
    public function toPercent(): Percent
    {
        return $this->toUnit(Percent::class);
    }

    public function toPartsPerMillion(): PartsPerMillion
    {
        return $this->toUnit(PartsPerMillion::class);
    }

    public function toPartsPerBillion(): PartsPerBillion
    {
        return $this->toUnit(PartsPerBillion::class);
    }

    /**
     * @template T of Percentage
     *
     * @param class-string<T> $fqn
     *
     * @return T
     */
    public function toUnit(string $fqn): Percentage
    {
        return $fqn::fromRatioValue($this->toRatioValue());
    }
}
