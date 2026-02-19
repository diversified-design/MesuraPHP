<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Pressure;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Pressure\StandardAtmosphere;

/**
 * @coversDefaultClass \MeasurementUnit\Pressure\StandardAtmosphere
 */
class StandardAtmosphereTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('atm', StandardAtmosphere::getSymbol());
    }

    /**
     * @covers ::fromPascalValue
     */
    public function testFromPascalValue(): void
    {
        $atm = StandardAtmosphere::fromPascalValue(42.0);
        static::assertEqualsWithDelta(0.000414506, $atm->getValue(), 0.000001);
    }

    /**
     * @covers ::toPascalValue
     */
    public function testToPascalValue(): void
    {
        static::assertEqualsWithDelta(4255650.0, (new StandardAtmosphere(42.0))->toPascalValue(), 0.000001);
    }
}
