<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Integration;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Length\Centimeter;
use MeasurementUnit\Length\Fathom;
use MeasurementUnit\Length\Foot;
use MeasurementUnit\Length\Furlong;
use MeasurementUnit\Length\HorseLength;
use MeasurementUnit\Length\Inch;
use MeasurementUnit\Length\Kilometer;
use MeasurementUnit\Length\Length;
use MeasurementUnit\Length\Meter;
use MeasurementUnit\Length\Millimeter;
use MeasurementUnit\Length\StatuteMile;
use MeasurementUnit\Length\NauticalMile;
use MeasurementUnit\Length\SurveyMile;
use MeasurementUnit\Length\Thou;
use MeasurementUnit\Length\Yard;

/** @coversNothing */
class LengthTest extends TestCase
{
    /** @var array<class-string<Length>> */
    private const LENGTH_FQN_S = [
        Centimeter::class,
        Fathom::class,
        Foot::class,
        Furlong::class,
        HorseLength::class,
        Inch::class,
        Kilometer::class,
        Meter::class,
        Millimeter::class,
        StatuteMile::class,
        NauticalMile::class,
        SurveyMile::class,
        Thou::class,
        Yard::class,
    ];

    /** @dataProvider lengthInstances */
    public function testReversibility(Length $length): void
    {
        static::assertEqualsWithDelta($length, $length::fromMeterValue($length->toMeterValue()), 0.000001);
    }

    /** @return iterable<class-string<Length>, array<Length>> */
    public function lengthInstances(): iterable
    {
        foreach (self::LENGTH_FQN_S as $lengthFQN) {
            yield $lengthFQN => [new $lengthFQN(42.0)];
        }
    }

    public function testCorrectConversionRate(): void
    {
        static::assertEqualsWithDelta(new Meter(0.42), (new Centimeter(42.0))->toMeter(), 0.000001);
        static::assertEqualsWithDelta(new Meter(76.8096), (new Fathom(42.0))->toMeter(), 0.000001);
        static::assertEqualsWithDelta(new Meter(12.8016), (new Foot(42.0))->toMeter(), 0.000001);
        static::assertEqualsWithDelta(new Meter(8449.056), (new Furlong(42.0))->toMeter(), 0.000001);
        static::assertEqualsWithDelta(new Meter(100.8), (new HorseLength(42.0))->toMeter(), 0.000001);
        static::assertEqualsWithDelta(new Meter(1.0668), (new Inch(42.0))->toMeter(), 0.000001);
        static::assertEqualsWithDelta(new Meter(42000.0), (new Kilometer(42.0))->toMeter(), 0.000001);
        static::assertEqualsWithDelta(new Meter(0.042), (new Millimeter(42.0))->toMeter(), 0.000001);
        static::assertEqualsWithDelta(new Meter(42.0), (new Meter(42.0))->toMeter(), 0.000001);
        static::assertEqualsWithDelta(new Meter(67592.448), (new StatuteMile(42.0))->toMeter(), 0.000001);
        static::assertEqualsWithDelta(new Meter(77784), (new NauticalMile(42.0))->toMeter(), 0.000001);
        static::assertEqualsWithDelta(new Meter(67592.5824), (new SurveyMile(42.0))->toMeter(), 0.000001);
        static::assertEqualsWithDelta(new Meter(0.0010668), (new Thou(42.0))->toMeter(), 0.000001);
        static::assertEqualsWithDelta(new Meter(38.4048), (new Yard(42.0))->toMeter(), 0.000001);
    }
}
