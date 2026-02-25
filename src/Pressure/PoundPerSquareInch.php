<?php

declare(strict_types=1);

namespace Mesura\Pressure;

use Brick\Math\BigRational;
use Mesura\UnitSystem;

class PoundPerSquareInch extends Pressure
{
    protected static string $defaultSymbol = 'psi';

    public static function fromPascalValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy('6894.757293168')->toFloat()
        );
    }

    public function toPascalValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy('6894.757293168')->toFloat();
    }

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::Imperial;
    }
}
