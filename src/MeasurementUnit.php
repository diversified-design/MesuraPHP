<?php

declare(strict_types=1);

namespace MeasurementUnit;

abstract class MeasurementUnit implements MeasurementUnitInterface
{
    protected static string $defaultSymbol = 'unit';

    protected string $symbol;

    public function __construct(
        public readonly float $value,
        ?string $symbol = null,
    ) {
        $this->symbol = $symbol ?? static::$defaultSymbol;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function getInstanceSymbol(): string
    {
        return $this->symbol;
    }

    public function setInstanceSymbol(string $symbol): static
    {
        $this->symbol = $symbol;

        return $this;
    }

    public static function getSymbol(): string
    {
        return static::$defaultSymbol;
    }

    public static function setSymbol(string $symbol): string
    {
        static::$defaultSymbol = $symbol;

        return static::$defaultSymbol;
    }

    // Formatting Methods
    public function toHtml(string $sprintfTemplate = '<span class="value">%1$.1f</span> <span class="symbol">%2$s</span>'): string
    {
        return $this->toFormat(sprintfTemplate: $sprintfTemplate);
    }

    public function toFormat(string $sprintfTemplate = '%.1f %s'): string
    {
        $value  = $this->getValue();
        $symbol = $this->getInstanceSymbol();

        return vsprintf($sprintfTemplate, [$value, $symbol]);
    }

    // Magic Methods
    public function __toString(): string
    {
        return $this->getValue() . ' ' . $this->getInstanceSymbol();
    }
}
