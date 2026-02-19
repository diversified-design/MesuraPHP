<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Temperature;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Temperature\Fahrenheit;

/**
 * @coversDefaultClass \MeasurementUnit\Temperature\Fahrenheit
 */
class FahrenheitTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('°F', Fahrenheit::getSymbol());
    }

    /**
     * @covers ::fromKelvinValue
     */
    public function testFromKelvinValue(): void
    {
        $fahrenheit = Fahrenheit::fromKelvinValue(42.0);
        static::assertEqualsWithDelta(-384.07, $fahrenheit->getValue(), 0.000001);
    }

    /**
     * @covers ::toKelvinValue
     */
    public function testToKelvinValue(): void
    {
        static::assertEqualsWithDelta(278.705555556, (new Fahrenheit(42.0))->toKelvinValue(), 0.000001);
    }
}
