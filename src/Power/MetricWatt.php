<?php

declare(strict_types=1);

namespace Mesura\Power;

use Brick\Math\BigRational;
use Mesura\MetricPrefix;
use Mesura\UnitSystem;

/** @phpstan-consistent-constructor */
abstract class MetricWatt extends Power
{
    abstract protected static function prefix(): MetricPrefix;

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::SI;
    }

    public static function fromWattValue(float $value): static
    {
        $rational = BigRational::of((string) $value);
        $exp      = static::prefix()->value;

        if ($exp >= 0) {
            return new static($rational->dividedBy(bcpow('10', (string) $exp))->toFloat());
        }

        return new static($rational->multipliedBy(bcpow('10', (string) abs($exp)))->toFloat());
    }

    public function toWattValue(): float
    {
        $rational = BigRational::of((string) $this->value);
        $exp      = static::prefix()->value;

        if ($exp >= 0) {
            return $rational->multipliedBy(bcpow('10', (string) $exp))->toFloat();
        }

        return $rational->dividedBy(bcpow('10', (string) abs($exp)))->toFloat();
    }
}
