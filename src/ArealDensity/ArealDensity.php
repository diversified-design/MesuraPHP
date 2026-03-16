<?php

declare(strict_types=1);

namespace Mesura\ArealDensity;

use Mesura\MeasurementUnit;

abstract class ArealDensity extends MeasurementUnit implements ArealDensityInterface
{
    protected static function unitAliases(): array
    {
        return [
            KilogramPerSquareMeter::class => ['kilogram per square meter', 'kilogram per square metre'],
            GramPerSquareMeter::class     => ['gram per square meter', 'gram per square metre'],
            OuncePerSquareYard::class     => ['ounce per square yard'],
            PoundPerSquareFoot::class     => ['pound per square foot'],
        ];
    }

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
