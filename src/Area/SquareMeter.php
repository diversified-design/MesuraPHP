<?php

declare(strict_types=1);

namespace Mesura\Area;

class SquareMeter extends Area
{
    protected static string $defaultSymbol = 'm²';

    public static function fromSquareMeterValue(float $value): static
    {
        return new static($value);
    }

    public function toSquareMeterValue(): float
    {
        return $this->value;
    }
}
