<?php

declare(strict_types=1);

namespace Mesura\MassConcentration;

use Mesura\BaseMeasurementUnit;

abstract class MassConcentration extends BaseMeasurementUnit implements MassConcentrationInterface
{
    public function toKilogramPerCubicMeter(): KilogramPerCubicMeter
    {
        return $this->toUnit(KilogramPerCubicMeter::class);
    }

    public function toGramPerCubicMeter(): GramPerCubicMeter
    {
        return $this->toUnit(GramPerCubicMeter::class);
    }

    public function toMilligramPerCubicMeter(): MilligramPerCubicMeter
    {
        return $this->toUnit(MilligramPerCubicMeter::class);
    }

    public function toMicrogramPerCubicMeter(): MicrogramPerCubicMeter
    {
        return $this->toUnit(MicrogramPerCubicMeter::class);
    }

    public function toGrainPerCubicMeter(): GrainPerCubicMeter
    {
        return $this->toUnit(GrainPerCubicMeter::class);
    }

    public function toGrainPerCubicFoot(): GrainPerCubicFoot
    {
        return $this->toUnit(GrainPerCubicFoot::class);
    }

    /**
     * @template T of MassConcentration
     *
     * @param class-string<T> $fqn
     *
     * @return T
     */
    public function toUnit(string $fqn): MassConcentration
    {
        return $fqn::fromKilogramPerCubicMeterValue($this->toKilogramPerCubicMeterValue());
    }
}
