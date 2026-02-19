<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Temperature;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Temperature\Rankine;

/**
 * @coversDefaultClass \MeasurementUnit\Temperature\Rankine
 */
class RankineTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('°R', Rankine::getSymbol());
    }

    /**
     * @covers ::fromKelvinValue
     */
    public function testFromKelvinValue(): void
    {
        $rankine = Rankine::fromKelvinValue(42.0);
        static::assertEqualsWithDelta(75.6, $rankine->getValue(), 0.000001);
    }

    /**
     * @covers ::toKelvinValue
     */
    public function testToKelvinValue(): void
    {
        static::assertEqualsWithDelta(23.3333333333, (new Rankine(42.0))->toKelvinValue(), 0.000001);
    }
}
