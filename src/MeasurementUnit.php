<?php

declare(strict_types=1);

namespace Mesura;

/** @phpstan-consistent-constructor */
abstract class MeasurementUnit implements MeasurementUnitInterface
{
    protected static string $defaultSymbol = 'unit';

    /** @var array<class-string, string> */
    private static array $symbolOverrides = [];

    protected string $symbol;

    public function __construct(
        public readonly float $value,
        ?string $symbol = null,
    ) {
        $this->symbol = $symbol ?? self::$symbolOverrides[static::class] ?? static::$defaultSymbol;
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
        return self::$symbolOverrides[static::class] ?? static::$defaultSymbol;
    }

    public static function setSymbol(string $symbol): void
    {
        self::$symbolOverrides[static::class] = $symbol;
    }

    public static function resetSymbol(): void
    {
        unset(self::$symbolOverrides[static::class]);
    }

    public static function resetAllSymbols(): void
    {
        self::$symbolOverrides = [];
    }

    /**
     * @param callable(float): (float|int) $callback
     */
    public function withValue(callable $callback): static
    {
        return new static((float) $callback($this->value), $this->symbol);
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

    // Abstract Methods
    abstract public static function unitSystem(): UnitSystem;
}
