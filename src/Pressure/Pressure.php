<?php

declare(strict_types=1);

namespace Mesura\Pressure;

use Mesura\MeasurementUnit;

abstract class Pressure extends MeasurementUnit implements PressureInterface
{
    protected static function unitAliases(): array
    {
        return [
            Pascal::class              => ['pascal'],
            Bar::class                 => ['bar'],
            Kilopascal::class          => ['kilopascal'],
            Hectopascal::class         => ['hectopascal'],
            Millibar::class            => ['millibar'],
            MillimetreOfMercury::class => ['millimetre of mercury', 'millimeter of mercury'],
            PoundPerSquareInch::class  => ['pound per square inch'],
            StandardAtmosphere::class  => ['standard atmosphere', 'atmosphere'],
            Torr::class                => ['torr'],
        ];
    }

    public function toBar(): Bar
    {
        return $this->toUnit(Bar::class);
    }

    public function toHectopascal(): Hectopascal
    {
        return $this->toUnit(Hectopascal::class);
    }

    public function toKilopascal(): Kilopascal
    {
        return $this->toUnit(Kilopascal::class);
    }

    public function toMillibar(): Millibar
    {
        return $this->toUnit(Millibar::class);
    }

    public function toMillimetreOfMercury(): MillimetreOfMercury
    {
        return $this->toUnit(MillimetreOfMercury::class);
    }

    public function toPascal(): Pascal
    {
        return $this->toUnit(Pascal::class);
    }

    public function toPoundPerSquareInch(): PoundPerSquareInch
    {
        return $this->toUnit(PoundPerSquareInch::class);
    }

    public function toStandardAtmosphere(): StandardAtmosphere
    {
        return $this->toUnit(StandardAtmosphere::class);
    }

    public function toTorr(): Torr
    {
        return $this->toUnit(Torr::class);
    }

    /**
     * @template T of Pressure
     *
     * @param class-string<T> $fqn
     *
     * @return T
     */
    public function toUnit(string $fqn): Pressure
    {
        return $fqn::fromPascalValue($this->toPascalValue());
    }
}
