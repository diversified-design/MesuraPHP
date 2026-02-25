<?php

declare(strict_types=1);

namespace Mesura\Pressure;

use Brick\Math\BigRational;
use Mesura\UnitSystem;

class Kilopascal extends Pressure
{
    protected static string $defaultSymbol = 'kPa';

    public static function fromPascalValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy('1000')->toFloat()
        );
    }

    public function toPascalValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy('1000')->toFloat();
    }

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::SI;
    }
}
