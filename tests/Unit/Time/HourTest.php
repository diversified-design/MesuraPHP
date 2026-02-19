<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Time;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Time\Hour;

/**
 * @coversDefaultClass \MeasurementUnit\Time\Hour
 */
class HourTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('h', Hour::getSymbol());
    }

    /**
     * @covers ::fromSecondValue
     */
    public function testFromSecondValue(): void
    {
        $hour = Hour::fromSecondValue(42.0);
        static::assertEqualsWithDelta(0.01166666666, $hour->getValue(), 0.000001);
    }

    /**
     * @covers ::toSecondValue
     */
    public function testToSecondValue(): void
    {
        static::assertEqualsWithDelta(151200.0, (new Hour(42.0))->toSecondValue(), 0.000001);
    }
}
