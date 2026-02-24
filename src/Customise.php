<?php

declare(strict_types=1);

namespace Mesura;

use Error;
use InvalidArgumentException;
use TypeError;

class Customise
{
    /**
     * Set the symbols for the given measurement units.
     *
     * @param array<class-string, string> $units An associative array where the keys are unit class names and the values are the symbols to set.
     *                                           e.g.: ['Mesura\Length\Meter' => 'METRE', 'Mesura\Length\Fathom' => 'FATHOM']
     *
     * @throws InvalidArgumentException if a class does not exist or is not a valid measurement unit
     */
    public static function unitSymbols(array $units): void
    {
        foreach ($units as $unitClass => $symbolString) {
            try {
                $unitClass::setSymbol($symbolString);
            } catch (TypeError $e) {
                throw new InvalidArgumentException("Class {$unitClass} is not a valid measurement unit.");
            } catch (Error $e) {
                throw new InvalidArgumentException("Class {$unitClass} does not exist.");
            }
        }
    }
}
