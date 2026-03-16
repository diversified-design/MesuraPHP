<?php

declare(strict_types=1);

namespace Mesura\Irradiance;

use Mesura\MeasurementUnit;

abstract class Irradiance extends MeasurementUnit implements IrradianceInterface
{
    protected static function unitAliases(): array
    {
        return [
            WattPerSquareMeter::class          => ['watt per square meter', 'watt per square metre'],
            KilowattPerSquareMeter::class      => ['kilowatt per square meter', 'kilowatt per square metre'],
            BtuPerHourPerSquareFoot::class     => ['btu per hour per square foot'],
        ];
    }

    public function toWattPerSquareMeter(): WattPerSquareMeter
    {
        return $this->toUnit(WattPerSquareMeter::class);
    }

    public function toKilowattPerSquareMeter(): KilowattPerSquareMeter
    {
        return $this->toUnit(KilowattPerSquareMeter::class);
    }

    public function toBtuPerHourPerSquareFoot(): BtuPerHourPerSquareFoot
    {
        return $this->toUnit(BtuPerHourPerSquareFoot::class);
    }

    /**
     * @template T of Irradiance
     *
     * @param class-string<T> $fqn
     *
     * @return T
     */
    public function toUnit(string $fqn): Irradiance
    {
        return $fqn::fromWattPerSquareMeterValue($this->toWattPerSquareMeterValue());
    }
}
