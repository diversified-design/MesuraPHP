<?php

declare(strict_types=1);

namespace Mesura\Area;

use Mesura\MeasurementUnit;

abstract class Area extends MeasurementUnit implements AreaInterface
{
    protected static function unitAliases(): array
    {
        return [
            SquareMeter::class => ['square meter', 'square metre', 'sq m'],
            SquareFoot::class  => ['square foot', 'sq ft'],
            SquareMile::class  => ['square mile', 'sq mi'],
            Hectare::class     => ['hectare'],
            Acre::class        => ['acre'],
        ];
    }

    protected static function metricConfig(): ?array
    {
        return [
            'namePatterns'  => ['square %smeter', 'square %smetre'],
            'symbolPattern' => '%sm²',
            'namespace'     => 'Mesura\Area\\',
            'classPattern'  => 'Square%smeter',
        ];
    }

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

    public function toSquareMillimeter(): SquareMillimeter
    {
        return $this->toUnit(SquareMillimeter::class);
    }

    public function toSquareCentimeter(): SquareCentimeter
    {
        return $this->toUnit(SquareCentimeter::class);
    }

    public function toSquareDecimeter(): SquareDecimeter
    {
        return $this->toUnit(SquareDecimeter::class);
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
