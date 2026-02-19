<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Pressure;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Pressure\PoundPerSquareInch;

/**
 * @coversDefaultClass \MeasurementUnit\Pressure\PoundPerSquareInch
 */
class PoundPerSquareInchTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('psi', PoundPerSquareInch::getSymbol());
    }

    /**
     * @covers ::fromPascalValue
     */
    public function testFromPascalValue(): void
    {
        $psi = PoundPerSquareInch::fromPascalValue(42.0);
        static::assertEqualsWithDelta(0.00609156, $psi->getValue(), 0.000001);
    }

    /**
     * @covers ::toPascalValue
     */
    public function testToPascalValue(): void
    {
        static::assertEqualsWithDelta(289579.806313056, (new PoundPerSquareInch(42.0))->toPascalValue(), 0.000001);
    }
}
