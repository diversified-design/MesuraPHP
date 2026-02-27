<?php

declare(strict_types=1);

namespace Mesura\Power;

use Mesura\MeasurementUnit;

abstract class Power extends MeasurementUnit implements PowerInterface
{
    public function toWatt(): Watt
    {
        return $this->toUnit(Watt::class);
    }

    public function toKilowatt(): Kilowatt
    {
        return $this->toUnit(Kilowatt::class);
    }

    public function toMegawatt(): Megawatt
    {
        return $this->toUnit(Megawatt::class);
    }

    public function toGigawatt(): Gigawatt
    {
        return $this->toUnit(Gigawatt::class);
    }

    public function toMilliwatt(): Milliwatt
    {
        return $this->toUnit(Milliwatt::class);
    }

    public function toMicrowatt(): Microwatt
    {
        return $this->toUnit(Microwatt::class);
    }

    public function toHorsepower(): Horsepower
    {
        return $this->toUnit(Horsepower::class);
    }

    public function toBtuPerHour(): BtuPerHour
    {
        return $this->toUnit(BtuPerHour::class);
    }

    public function toFootPoundPerSecond(): FootPoundPerSecond
    {
        return $this->toUnit(FootPoundPerSecond::class);
    }

    public function toCaloriePerSecond(): CaloriePerSecond
    {
        return $this->toUnit(CaloriePerSecond::class);
    }

    /**
     * @template T of Power
     *
     * @param class-string<T> $fqn
     *
     * @return T
     */
    public function toUnit(string $fqn): Power
    {
        return $fqn::fromWattValue($this->toWattValue());
    }
}
