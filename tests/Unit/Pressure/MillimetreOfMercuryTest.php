<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Pressure;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Pressure\MillimetreOfMercury;

/**
 * @coversDefaultClass \MeasurementUnit\Pressure\MillimetreOfMercury
 */
class MillimetreOfMercuryTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('mmHg', MillimetreOfMercury::getSymbol());
    }

    /**
     * @covers ::fromPascalValue
     */
    public function testFromPascalValue(): void
    {
        $mmhg = MillimetreOfMercury::fromPascalValue(42.0);
        static::assertEqualsWithDelta(0.315026, $mmhg->getValue(), 0.0001);
    }

    /**
     * @covers ::toPascalValue
     */
    public function testToPascalValue(): void
    {
        static::assertEqualsWithDelta(5599.54027143, (new MillimetreOfMercury(42.0))->toPascalValue(), 0.000001);
    }
}
