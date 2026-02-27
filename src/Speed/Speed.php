<?php

declare(strict_types=1);

namespace Mesura\Speed;

use Mesura\MeasurementUnit;

abstract class Speed extends MeasurementUnit implements SpeedInterface
{
    public function toKilometerPerHour(): KilometerPerHour
    {
        return $this->toUnit(KilometerPerHour::class);
    }

    public function toKnot(): Knot
    {
        return $this->toUnit(Knot::class);
    }

    public function toMeterPerSecond(): MeterPerSecond
    {
        return $this->toUnit(MeterPerSecond::class);
    }

    public function toMilesPerHour(): MilesPerHour
    {
        return $this->toUnit(MilesPerHour::class);
    }

    /**
     * @template T of Speed
     *
     * @param class-string<T> $fqn
     *
     * @return T
     */
    public function toUnit(string $fqn): Speed
    {
        return $fqn::fromMeterPerSecondValue($this->toMeterPerSecondValue());
    }
}
