<?php

declare(strict_types=1);

namespace Mesura\Weight;

use Mesura\MeasurementUnit;

abstract class Weight extends MeasurementUnit implements WeightInterface
{
    public function toKilogram(): Kilogram
    {
        return $this->toUnit(Kilogram::class);
    }

    public function toMetricTon(): MetricTon
    {
        return $this->toUnit(MetricTon::class);
    }

    public function toPound(): Pound
    {
        return $this->toUnit(Pound::class);
    }

    public function toGram(): Gram
    {
        return $this->toUnit(Gram::class);
    }

    public function toMilligram(): Milligram
    {
        return $this->toUnit(Milligram::class);
    }

    public function toMicrogram(): Microgram
    {
        return $this->toUnit(Microgram::class);
    }

    public function toNanogram(): Nanogram
    {
        return $this->toUnit(Nanogram::class);
    }

    public function toDecigram(): Decigram
    {
        return $this->toUnit(Decigram::class);
    }

    public function toCentigram(): Centigram
    {
        return $this->toUnit(Centigram::class);
    }

    public function toDecagram(): Decagram
    {
        return $this->toUnit(Decagram::class);
    }

    public function toHectogram(): Hectogram
    {
        return $this->toUnit(Hectogram::class);
    }

    public function toMegagram(): Megagram
    {
        return $this->toUnit(Megagram::class);
    }

    /**
     * @template T of Weight
     *
     * @param class-string<T> $fqn
     *
     * @return T
     */
    public function toUnit(string $fqn): Weight
    {
        return $fqn::fromKilogramValue($this->toKilogramValue());
    }
}
