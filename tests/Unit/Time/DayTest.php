<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Time;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Time\Day;

/**
 * @coversDefaultClass \MeasurementUnit\Time\Day
 */
class DayTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('d', Day::getSymbol());
    }

    /**
     * @covers ::fromSecondValue
     */
    public function testFromSecondValue(): void
    {
        $day = Day::fromSecondValue(42.0);
        static::assertEqualsWithDelta(0.00048611111, $day->getValue(), 0.000001);
    }

    /**
     * @covers ::toSecondValue
     */
    public function testToSecondValue(): void
    {
        static::assertEqualsWithDelta(3628800.0, (new Day(42.0))->toSecondValue(), 0.000001);
    }
}
