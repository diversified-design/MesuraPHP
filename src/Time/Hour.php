<?php
declare(strict_types=1);

namespace MeasurementUnit\Time;

use Brick\Math\BigRational;

class Hour extends Time
{
    protected static string $defaultSymbol = 'h';

    public static function fromSecondValue(float $value): self
    {
        return new self(
            BigRational::of($value)->dividedBy('3600')->toFloat()
        );
    }

    public function toSecondValue(): float
    {
        return BigRational::of($this->value)->multipliedBy('3600')->toFloat();
    }
}
