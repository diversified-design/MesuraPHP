<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Length;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Length\SurveyMile;

/**
 * @coversDefaultClass \MeasurementUnit\Length\SurveyMile
 */
class StatuteMileTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testgetSymbol(): void
    {
        static::assertSame('mi', SurveyMile::getSymbol());
    }

    /**
     * @covers ::fromMeterValue
     */
    public function testFromMeterValue(): void
    {
        $surveyMile = SurveyMile::fromMeterValue(42.0);
        static::assertEqualsWithDelta(0.02609753818, $surveyMile->getValue(), 0.000001);
    }

    /**
     * @covers ::toMeterValue
     */
    public function testToMeterValue(): void
    {
        static::assertEqualsWithDelta(67592.5824, (new SurveyMile(42.0))->toMeterValue(), 0.000001);
    }
}
