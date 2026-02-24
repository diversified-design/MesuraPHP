<?php

declare(strict_types=1);

namespace MeasurementUnit;

use Stringable;

interface MeasurementUnitInterface extends Stringable
{
    public function getValue(): float;

    public function getInstanceSymbol(): string;

    public function setInstanceSymbol(string $symbol): self;

    public static function getSymbol(): string;

    public static function setSymbol(string $symbol): string;

    /**
     * @param callable(float): (float|int) $callback
     */
    public function withValue(callable $callback): static;
}
