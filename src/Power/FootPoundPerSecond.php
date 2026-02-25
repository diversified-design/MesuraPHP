<?php

declare(strict_types=1);

namespace Mesura\Power;

use Brick\Math\BigRational;

class FootPoundPerSecond extends Power
{
    protected static string $defaultSymbol = 'ft⋅lbf/s';

    /** 1 ft⋅lbf/s = 1.3558179483314004 W */
    private const WATTS_PER_FT_LBF_S = '1.3558179483314004';

    public static function fromWattValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy(self::WATTS_PER_FT_LBF_S)->toFloat()
        );
    }

    public function toWattValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy(self::WATTS_PER_FT_LBF_S)->toFloat();
    }
}
