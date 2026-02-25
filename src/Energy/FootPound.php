<?php

declare(strict_types=1);

namespace Mesura\Energy;

use Brick\Math\BigRational;

class FootPound extends Energy
{
    protected static string $defaultSymbol = 'ft⋅lbf';

    /** 1 ft⋅lbf = 1.3558179483314004 J */
    private const JOULES_PER_FOOT_POUND = '1.3558179483314004';

    public static function fromJouleValue(float $value): static
    {
        return new static(
            BigRational::of((string) $value)->dividedBy(self::JOULES_PER_FOOT_POUND)->toFloat()
        );
    }

    public function toJouleValue(): float
    {
        return BigRational::of((string) $this->value)->multipliedBy(self::JOULES_PER_FOOT_POUND)->toFloat();
    }
}
