<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Time;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Time\Second;

/**
 * @coversDefaultClass \MeasurementUnit\Time\Second
 */
class SecondTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('s', Second::getSymbol());
    }

    /**
     * @covers ::fromSecondValue
     */
    public function testFromSecondValue(): void
    {
        $second = Second::fromSecondValue(42.0);
        static::assertEqualsWithDelta(42.0, $second->getValue(), 0.000001);
    }

    /**
     * @covers ::toSecondValue
     */
    public function testToSecondValue(): void
    {
        static::assertSame(42.0, (new Second(42.0))->toSecondValue());
    }
}
