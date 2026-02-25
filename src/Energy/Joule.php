<?php

declare(strict_types=1);

namespace Mesura\Energy;

use Mesura\UnitSystem;

class Joule extends Energy
{
    protected static string $defaultSymbol = 'J';

    public static function fromJouleValue(float $value): static
    {
        return new static($value);
    }

    public function toJouleValue(): float
    {
        return $this->value;
    }

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::SI;
    }
}
