<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Volume;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Volume\Pint;

/**
 * @coversDefaultClass \MeasurementUnit\Volume\Pint
 */
class PintTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('pt', Pint::getSymbol());
    }

    /**
     * @covers ::fromCubicMeterValue
     */
    public function testFromCubicMeterValue(): void
    {
        $pint = Pint::fromCubicMeterValue(42.0);
        static::assertEqualsWithDelta(88761.8983211, $pint->getValue(), 0.01);
    }

    /**
     * @covers ::toCubicMeterValue
     */
    public function testToCubicMeterValue(): void
    {
        static::assertEqualsWithDelta(0.019873392, (new Pint(42.0))->toCubicMeterValue(), 0.000001);
    }
}
