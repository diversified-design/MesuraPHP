<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Weight;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Weight\Pound;

/**
 * @coversDefaultClass \MeasurementUnit\Weight\Pound
 */
class PoundTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('lb', Pound::getSymbol());
    }

    /**
     * @covers ::fromKilogramValue
     */
    public function testFromMeterPerSecondValue(): void
    {
        $pound = Pound::fromKilogramValue(42.0);
        static::assertEqualsWithDelta(92.5942256477, $pound->getValue(), 0.000001);
    }

    /**
     * @covers ::toKilogramValue
     */
    public function testToMeterPerSecondValue(): void
    {
        static::assertEqualsWithDelta(19.050864, (new Pound(42.0))->toKilogramValue(), 0.000001);
    }
}
