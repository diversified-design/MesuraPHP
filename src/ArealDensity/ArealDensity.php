<?php

declare(strict_types=1);

namespace Mesura\ArealDensity;

use Mesura\BaseMeasurementUnit;

abstract class ArealDensity extends BaseMeasurementUnit implements ArealDensityInterface
{
    public function toKilogramPerSquareMeter(): KilogramPerSquareMeter
    {
        return $this->toUnit(KilogramPerSquareMeter::class);
    }

    public function toGramPerSquareMeter(): GramPerSquareMeter
    {
        return $this->toUnit(GramPerSquareMeter::class);
    }

    public function toOuncePerSquareYard(): OuncePerSquareYard
    {
        return $this->toUnit(OuncePerSquareYard::class);
    }

    public function toPoundPerSquareFoot(): PoundPerSquareFoot
    {
        return $this->toUnit(PoundPerSquareFoot::class);
    }

    /**
     * @template T of ArealDensity
     *
     * @param class-string<T> $fqn
     *
     * @return T
     */
    public function toUnit(string $fqn): ArealDensity
    {
        return $fqn::fromKilogramPerSquareMeterValue($this->toKilogramPerSquareMeterValue());
    }
}
