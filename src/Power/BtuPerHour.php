<?php

declare(strict_types=1);

namespace Mesura\Power;

use Brick\Math\BigRational;

class BtuPerHour extends Power
{
    protected static string $defaultSymbol = 'BTU/h';

    /** 1 BTU = 1055.05585262 J (ISO 31-4) */
    private const JOULES_PER_BTU = '1055.05585262';

    /** 1 hour = 3600 seconds */
    private const SECONDS_PER_HOUR = '3600';

    public static function fromWattValue(float $value): static
    {
        // BTU/h = W * 3600 / 1055.05585262
        return new static(
            BigRational::of((string) $value)
                ->multipliedBy(self::SECONDS_PER_HOUR)
                ->dividedBy(self::JOULES_PER_BTU)
                ->toFloat()
        );
    }

    public function toWattValue(): float
    {
        // W = BTU/h * 1055.05585262 / 3600
        return BigRational::of((string) $this->value)
            ->multipliedBy(self::JOULES_PER_BTU)
            ->dividedBy(self::SECONDS_PER_HOUR)
            ->toFloat()
        ;
    }
}
