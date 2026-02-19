<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Time;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Time\Minute;

/**
 * @coversDefaultClass \MeasurementUnit\Time\Minute
 */
class MinuteTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('min', Minute::getSymbol());
    }

    /**
     * @covers ::fromSecondValue
     */
    public function testFromSecondValue(): void
    {
        $minute = Minute::fromSecondValue(42.0);
        static::assertEqualsWithDelta(0.7, $minute->getValue(), 0.000001);
    }

    /**
     * @covers ::toSecondValue
     */
    public function testToSecondValue(): void
    {
        static::assertEqualsWithDelta(2520.0, (new Minute(42.0))->toSecondValue(), 0.000001);
    }
}
