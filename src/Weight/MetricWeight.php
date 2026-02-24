<?php

declare(strict_types=1);

namespace Mesura\Weight;

use Brick\Math\BigRational;
use Mesura\MetricPrefix;

/** @phpstan-consistent-constructor */
abstract class MetricWeight extends Weight
{
    abstract protected static function prefix(): MetricPrefix;

    public static function fromKilogramValue(float $value): static
    {
        // gram = 10^-3 kg, so prefix-gram = 10^(prefix - 3) kg
        $rational = BigRational::of((string) $value);
        $exp      = static::prefix()->value - 3;

        if ($exp >= 0) {
            return new static($rational->dividedBy(bcpow('10', (string) $exp))->toFloat());
        }

        return new static($rational->multipliedBy(bcpow('10', (string) abs($exp)))->toFloat());
    }

    public function toKilogramValue(): float
    {
        $rational = BigRational::of((string) $this->value);
        $exp      = static::prefix()->value - 3;

        if ($exp >= 0) {
            return $rational->multipliedBy(bcpow('10', (string) $exp))->toFloat();
        }

        return $rational->dividedBy(bcpow('10', (string) abs($exp)))->toFloat();
    }
}
