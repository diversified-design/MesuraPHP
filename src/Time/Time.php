<?php

declare(strict_types=1);

namespace Mesura\Time;

use Mesura\BaseMeasurementUnit;

abstract class Time extends BaseMeasurementUnit implements TimeInterface
{
    public function toSecond(): Second
    {
        return $this->toUnit(Second::class);
    }

    public function toMinute(): Minute
    {
        return $this->toUnit(Minute::class);
    }

    public function toHour(): Hour
    {
        return $this->toUnit(Hour::class);
    }

    public function toDay(): Day
    {
        return $this->toUnit(Day::class);
    }

    /**
     * @template T of Time
     *
     * @param class-string<T> $fqn
     *
     * @return T
     */
    public function toUnit(string $fqn): Time
    {
        return $fqn::fromSecondValue($this->toSecondValue());
    }
}
