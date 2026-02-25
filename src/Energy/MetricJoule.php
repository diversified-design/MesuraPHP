<?php

declare(strict_types=1);

namespace Mesura\Energy;

use Brick\Math\BigRational;
use Mesura\MetricPrefix;
use Mesura\UnitSystem;

/** @phpstan-consistent-constructor */
abstract class MetricJoule extends Energy
{
    abstract protected static function prefix(): MetricPrefix;

    public static function unitSystem(): UnitSystem
    {
        return UnitSystem::SI;
    }

    public static function fromJouleValue(float $value): static
    {
        $rational = BigRational::of((string) $value);
        $exp      = static::prefix()->value;

        // 10^prefix: positive means divide (downscale), negative means multiply (upscale)
        if ($exp >= 0) {
            return new static($rational->dividedBy(bcpow('10', (string) $exp))->toFloat());
        }

        return new static($rational->multipliedBy(bcpow('10', (string) abs($exp)))->toFloat());
    }

    public function toJouleValue(): float
    {
        $rational = BigRational::of((string) $this->value);
        $exp      = static::prefix()->value;

        if ($exp >= 0) {
            return $rational->multipliedBy(bcpow('10', (string) $exp))->toFloat();
        }

        return $rational->dividedBy(bcpow('10', (string) abs($exp)))->toFloat();
    }
}
