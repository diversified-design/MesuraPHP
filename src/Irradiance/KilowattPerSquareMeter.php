<?php

declare(strict_types=1);

namespace Mesura\Irradiance;

use Brick\Math\BigRational;
use Mesura\UnitSystem;

class KilowattPerSquareMeter extends Irradiance
{
    protected static string $defaultSymbol = 'kW/m²';

    public static function fromWattPerSquareMeterValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy(1000)->toFloat()
        );
    }

    public function toWattPerSquareMeterValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy(1000)->toFloat();
    }

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::SI;
    }
}
