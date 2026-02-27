<?php

declare(strict_types=1);

namespace Mesura\Angle;

use Mesura\BaseMeasurementUnit;

abstract class Angle extends BaseMeasurementUnit implements AngleInterface
{
    public function toDegree(): Degree
    {
        return $this->toUnit(Degree::class);
    }

    public function toRadian(): Radian
    {
        return $this->toUnit(Radian::class);
    }

    /**
     * @template T of Angle
     *
     * @param class-string<T> $fqn
     *
     * @return T
     */
    public function toUnit(string $fqn): Angle
    {
        return $fqn::fromRadianValue($this->toRadianValue());
    }
}
