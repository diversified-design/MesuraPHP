<?php

declare(strict_types=1);

namespace Mesura\Length;

use Brick\Math\BigRational;
use Mesura\UnitSystem;

class Inch extends Length
{
    protected static string $defaultSymbol = 'in';

    public static function fromMeterValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy('0.0254')->toFloat()
        );
    }

    public function toMeterValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy('0.0254')->toFloat();
    }

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::Imperial;
    }
}
