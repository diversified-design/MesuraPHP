<?php

declare(strict_types=1);

namespace Mesura\Pressure;

use Brick\Math\BigRational;
use Mesura\UnitSystem;

class MillimetreOfMercury extends Pressure
{
    protected static string $defaultSymbol = 'mmHg';

    public static function fromPascalValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy('133.322387415')->toFloat()
        );
    }

    public function toPascalValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy('133.322387415')->toFloat();
    }

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::Other;
    }
}
