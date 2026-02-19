<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Volume;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Volume\TableSpoon;

/**
 * @coversDefaultClass \MeasurementUnit\Volume\TableSpoon
 */
class TableSpoonTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('tbsp', TableSpoon::getSymbol());
    }

    /**
     * @covers ::fromCubicMeterValue
     */
    public function testFromCubicMeterValue(): void
    {
        $tableSpoon = TableSpoon::fromCubicMeterValue(42.0);
        static::assertEqualsWithDelta(2840371.14183, $tableSpoon->getValue(), 1.0);
    }

    /**
     * @covers ::toCubicMeterValue
     */
    public function testToCubicMeterValue(): void
    {
        static::assertEqualsWithDelta(0.0006210456, (new TableSpoon(42.0))->toCubicMeterValue(), 0.000001);
    }
}
