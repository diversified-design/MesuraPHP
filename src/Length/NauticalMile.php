<?php

declare(strict_types=1);

namespace Mesura\Length;

use Brick\Math\BigRational;
use Mesura\UnitSystem;

class NauticalMile extends Length
{
    protected static string $defaultSymbol = 'nmi';

    public static function fromMeterValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy('1852')->toFloat()
        );
    }

    public function toMeterValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy('1852')->toFloat();
    }

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::Nautical;
    }
}
