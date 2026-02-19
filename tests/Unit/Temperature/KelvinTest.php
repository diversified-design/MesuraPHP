<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Temperature;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Temperature\Kelvin;

/**
 * @coversDefaultClass \MeasurementUnit\Temperature\Kelvin
 */
class KelvinTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('K', Kelvin::getSymbol());
    }

    /**
     * @covers ::fromKelvinValue
     */
    public function testFromKelvinValue(): void
    {
        $kelvin = Kelvin::fromKelvinValue(42.0);
        static::assertEqualsWithDelta(42.0, $kelvin->getValue(), 0.000001);
    }

    /**
     * @covers ::toKelvinValue
     */
    public function testToKelvinValue(): void
    {
        static::assertSame(42.0, (new Kelvin(42.0))->toKelvinValue());
    }
}
