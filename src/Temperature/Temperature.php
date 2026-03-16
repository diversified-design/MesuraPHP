<?php

declare(strict_types=1);

namespace Mesura\Temperature;

use Mesura\MeasurementUnit;

abstract class Temperature extends MeasurementUnit implements TemperatureInterface
{
    protected static function unitAliases(): array
    {
        return [
            Celsius::class    => ['celsius', 'centigrade'],
            Fahrenheit::class => ['fahrenheit'],
            Kelvin::class     => ['kelvin'],
            Rankine::class    => ['rankine'],
        ];
    }


    public function toCelsius(): Celsius
    {
        return $this->toUnit(Celsius::class);
    }

    public function toFahrenheit(): Fahrenheit
    {
        return $this->toUnit(Fahrenheit::class);
    }

    public function toRankine(): Rankine
    {
        return $this->toUnit(Rankine::class);
    }

    public function toKelvin(): Kelvin
    {
        return $this->toUnit(Kelvin::class);
    }

    /**
     * @template T of Temperature
     *
     * @param class-string<T> $fqn
     *
     * @return T
     */
    public function toUnit(string $fqn): Temperature
    {
        return $fqn::fromKelvinValue($this->toKelvinValue());
    }
}
