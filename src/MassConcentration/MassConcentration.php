<?php

declare(strict_types=1);

namespace Mesura\MassConcentration;

use Mesura\MeasurementUnit;

abstract class MassConcentration extends MeasurementUnit implements MassConcentrationInterface
{
    protected static function unitAliases(): array
    {
        return [
            KilogramPerCubicMeter::class  => ['kilogram per cubic meter', 'kilogram per cubic metre'],
            GramPerCubicMeter::class      => ['gram per cubic meter', 'gram per cubic metre'],
            MilligramPerCubicMeter::class => ['milligram per cubic meter', 'milligram per cubic metre'],
            MicrogramPerCubicMeter::class => ['microgram per cubic meter', 'microgram per cubic metre'],
            GrainPerCubicMeter::class     => ['grain per cubic meter', 'grain per cubic metre'],
            GrainPerCubicFoot::class      => ['grain per cubic foot'],
        ];
    }

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
