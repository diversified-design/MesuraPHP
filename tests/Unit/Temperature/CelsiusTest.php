<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Temperature;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Temperature\Celsius;

/**
 * @coversDefaultClass \MeasurementUnit\Temperature\Celsius
 */
class CelsiusTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('°C', Celsius::getSymbol());
    }

    /**
     * @covers ::fromKelvinValue
     */
    public function testFromKelvinValue(): void
    {
        $celsius = Celsius::fromKelvinValue(42.0);
        static::assertEqualsWithDelta(-231.15, $celsius->getValue(), 0.000001);
    }

    /**
     * @covers ::toKelvinValue
     */
    public function testToKelvinValue(): void
    {
        static::assertEqualsWithDelta(315.15, (new Celsius(42.0))->toKelvinValue(), 0.000001);
    }
}
