<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Percentage;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Percentage\Percent;

/**
 * @coversDefaultClass \MeasurementUnit\Percentage\Percent
 */
class PercentTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('%', Percent::getSymbol());
    }

    /**
     * @covers ::getValue
     */
    public function testGetValue(): void
    {
        $percent = new Percent(42.0);
        static::assertSame(42.0, $percent->getValue());
    }

    /**
     * @covers ::toDecimal
     */
    public function testToDecimal(): void
    {
        $percent = new Percent(42.0);
        static::assertEqualsWithDelta(0.42, $percent->toDecimal(), 0.000001);
    }

    /**
     * @covers ::toCoefficient
     */
    public function testToCoefficient(): void
    {
        $percent = new Percent(42.0);
        static::assertEqualsWithDelta(1.42, $percent->toCoefficient(), 0.000001);
    }
}
