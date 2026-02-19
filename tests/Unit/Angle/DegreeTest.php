<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Angle;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Angle\Degree;

/**
 * @coversDefaultClass \MeasurementUnit\Angle\Degree
 */
class DegreeTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('°', Degree::getSymbol());
    }

    /**
     * @covers ::fromRadianValue
     */
    public function testFromRadianValue(): void
    {
        $degree = Degree::fromRadianValue(42.0);
        static::assertEqualsWithDelta(2406.4227395494577, $degree->getValue(), 0.000001);
    }

    /**
     * @covers ::toRadianValue
     */
    public function testToRadianValue(): void
    {
        static::assertEqualsWithDelta(0.7330382858376184, (new Degree(42.0))->toRadianValue(), 0.000001);
    }
}
