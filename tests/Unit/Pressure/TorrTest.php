<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Pressure;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Pressure\Torr;

/**
 * @coversDefaultClass \MeasurementUnit\Pressure\Torr
 */
class TorrTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('Torr', Torr::getSymbol());
    }

    /**
     * @covers ::fromPascalValue
     */
    public function testFromPascalValue(): void
    {
        $torr = Torr::fromPascalValue(42.0);
        static::assertEqualsWithDelta(0.315026, $torr->getValue(), 0.0001);
    }

    /**
     * @covers ::toPascalValue
     */
    public function testToPascalValue(): void
    {
        static::assertEqualsWithDelta(5599.53947368, (new Torr(42.0))->toPascalValue(), 0.000001);
    }
}
