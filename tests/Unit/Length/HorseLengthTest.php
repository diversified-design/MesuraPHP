<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Length;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Length\HorseLength;

/**
 * @coversDefaultClass \MeasurementUnit\Length\HorseLength
 */
class HorseLengthTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testgetSymbol(): void
    {
        static::assertSame('hl', HorseLength::getSymbol());
    }

    /**
     * @covers ::fromMeterValue
     */
    public function testFromMeterValue(): void
    {
        $horseLength = HorseLength::fromMeterValue(42.0);
        static::assertEqualsWithDelta(17.5, $horseLength->getValue(), 0.000001);
    }

    /**
     * @covers ::toMeterValue
     */
    public function testToMeterValue(): void
    {
        static::assertEqualsWithDelta(100.8, (new HorseLength(42.0))->toMeterValue(), 0.000001);
    }
}
