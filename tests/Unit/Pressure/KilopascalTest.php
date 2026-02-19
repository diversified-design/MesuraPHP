<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Pressure;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Pressure\Kilopascal;

/**
 * @coversDefaultClass \MeasurementUnit\Pressure\Kilopascal
 */
class KilopascalTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('kPa', Kilopascal::getSymbol());
    }

    /**
     * @covers ::fromPascalValue
     */
    public function testFromPascalValue(): void
    {
        $kilopascal = Kilopascal::fromPascalValue(42.0);
        static::assertEqualsWithDelta(0.042, $kilopascal->getValue(), 0.000001);
    }

    /**
     * @covers ::toPascalValue
     */
    public function testToPascalValue(): void
    {
        static::assertEqualsWithDelta(42000.0, (new Kilopascal(42.0))->toPascalValue(), 0.000001);
    }
}
