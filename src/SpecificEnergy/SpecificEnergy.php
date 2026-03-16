<?php

declare(strict_types=1);

namespace Mesura\SpecificEnergy;

use Mesura\MeasurementUnit;

abstract class SpecificEnergy extends MeasurementUnit implements SpecificEnergyInterface
{
    protected static function unitAliases(): array
    {
        return [
            JoulePerKilogram::class      => ['jpkg', 'joule per kilogram'],
            KilojoulePerKilogram::class  => ['kjpkg', 'kilojoule per kilogram'],
            MegajoulePerKilogram::class  => ['mjpkg', 'megajoule per kilogram'],
            BtuPerPound::class           => ['btup', 'btu per pound'],
            CaloriePerGram::class        => ['calpg', 'calorie per gram'],
        ];
    }

    public function toJoulePerKilogram(): JoulePerKilogram
    {
        return $this->toUnit(JoulePerKilogram::class);
    }

    public function toKilojoulePerKilogram(): KilojoulePerKilogram
    {
        return $this->toUnit(KilojoulePerKilogram::class);
    }

    public function toMegajoulePerKilogram(): MegajoulePerKilogram
    {
        return $this->toUnit(MegajoulePerKilogram::class);
    }

    public function toBtuPerPound(): BtuPerPound
    {
        return $this->toUnit(BtuPerPound::class);
    }

    public function toCaloriePerGram(): CaloriePerGram
    {
        return $this->toUnit(CaloriePerGram::class);
    }

    /**
     * @template T of SpecificEnergy
     *
     * @param class-string<T> $fqn
     *
     * @return T
     */
    public function toUnit(string $fqn): SpecificEnergy
    {
        return $fqn::fromJoulePerKilogramValue($this->toJoulePerKilogramValue());
    }
}
