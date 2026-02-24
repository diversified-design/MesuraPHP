<?php

declare(strict_types=1);

namespace MeasurementUnit\Volume;

use Brick\Math\BigRational;
use MeasurementUnit\MetricPrefix;

abstract class MetricLiter extends Volume
{
    abstract protected static function prefix(): MetricPrefix;

    public static function fromCubicMeterValue(float $value): static
    {
        // liter = 10^-3 m³, so prefix-liter = 10^(prefix - 3) m³
        $rational = BigRational::of((string) $value);
        $exp = static::prefix()->value - 3;

        if ($exp >= 0) {
            return new static($rational->dividedBy(bcpow('10', (string) $exp))->toFloat());
        }

        return new static($rational->multipliedBy(bcpow('10', (string) abs($exp)))->toFloat());
    }

    public function toCubicMeterValue(): float
    {
        $rational = BigRational::of((string) $this->value);
        $exp = static::prefix()->value - 3;

        if ($exp >= 0) {
            return $rational->multipliedBy(bcpow('10', (string) $exp))->toFloat();
        }

        return $rational->dividedBy(bcpow('10', (string) abs($exp)))->toFloat();
    }
}
