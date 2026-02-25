<?php

declare(strict_types=1);

namespace Mesura\Energy;

use Mesura\MeasurementUnit;

abstract class Energy extends MeasurementUnit implements EnergyInterface
{
    public function toJoule(): Joule
    {
        return $this->toUnit(Joule::class);
    }

    public function toKilojoule(): Kilojoule
    {
        return $this->toUnit(Kilojoule::class);
    }

    public function toMegajoule(): Megajoule
    {
        return $this->toUnit(Megajoule::class);
    }

    public function toGigajoule(): Gigajoule
    {
        return $this->toUnit(Gigajoule::class);
    }

    public function toMillijoule(): Millijoule
    {
        return $this->toUnit(Millijoule::class);
    }

    public function toMicrojoule(): Microjoule
    {
        return $this->toUnit(Microjoule::class);
    }

    public function toNanojoule(): Nanojoule
    {
        return $this->toUnit(Nanojoule::class);
    }

    public function toCalorie(): Calorie
    {
        return $this->toUnit(Calorie::class);
    }

    public function toKilocalorie(): Kilocalorie
    {
        return $this->toUnit(Kilocalorie::class);
    }

    public function toBritishThermalUnit(): BritishThermalUnit
    {
        return $this->toUnit(BritishThermalUnit::class);
    }

    public function toWattHour(): WattHour
    {
        return $this->toUnit(WattHour::class);
    }

    public function toKilowattHour(): KilowattHour
    {
        return $this->toUnit(KilowattHour::class);
    }

    public function toFootPound(): FootPound
    {
        return $this->toUnit(FootPound::class);
    }

    /**
     * @template T of Energy
     *
     * @param class-string<T> $fqn
     *
     * @return T
     */
    public function toUnit(string $fqn): Energy
    {
        return $fqn::fromJouleValue($this->toJouleValue());
    }
}
