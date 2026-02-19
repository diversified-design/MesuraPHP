<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Length;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Length\Fathom;

/**
 * @coversDefaultClass \MeasurementUnit\Length\Fathom
 */
class FathomTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testgetSymbol(): void
    {
        static::assertSame('ftm', Fathom::getSymbol());
    }

    /**
     * @covers ::fromMeterValue
     */
    public function testFromMeterValue(): void
    {
        $fathom = Fathom::fromMeterValue(42.0);
        static::assertEqualsWithDelta(22.9658792651, $fathom->getValue(), 0.000001);
    }

    /**
     * @covers ::toMeterValue
     */
    public function testToMeterValue(): void
    {
        static::assertEqualsWithDelta(76.8096, (new Fathom(42.0))->toMeterValue(), 0.000001);
    }
}
