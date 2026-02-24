<?php

declare(strict_types=1);

namespace MeasurementUnit\Area;

use MeasurementUnit\MeasurementUnit;

abstract class Area extends MeasurementUnit implements AreaInterface
{
    public function toSquareMeter(): SquareMeter
    {
        return $this->toUnit(SquareMeter::class);
    }

    public function toSquareKilometer(): SquareKilometer
    {
        return $this->toUnit(SquareKilometer::class);
    }

    public function toSquareFoot(): SquareFoot
    {
        return $this->toUnit(SquareFoot::class);
    }

    public function toSquareMile(): SquareMile
    {
        return $this->toUnit(SquareMile::class);
    }

    public function toHectare(): Hectare
    {
        return $this->toUnit(Hectare::class);
    }

    public function toAcre(): Acre
    {
        return $this->toUnit(Acre::class);
    }

    /**
     * @template T of Area
     *
     * @param class-string<T> $fqn
     *
     * @return T
     */
    public function toUnit(string $fqn): Area
    {
        return $fqn::fromSquareMeterValue($this->toSquareMeterValue());
    }
}
