<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Integration;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Pressure\Bar;
use MeasurementUnit\Pressure\Hectopascal;
use MeasurementUnit\Pressure\Kilopascal;
use MeasurementUnit\Pressure\Millibar;
use MeasurementUnit\Pressure\MillimetreOfMercury;
use MeasurementUnit\Pressure\Pascal;
use MeasurementUnit\Pressure\PoundPerSquareInch;
use MeasurementUnit\Pressure\Pressure;
use MeasurementUnit\Pressure\StandardAtmosphere;
use MeasurementUnit\Pressure\Torr;

/** @coversNothing */
class PressureTest extends TestCase
{
    /** @var array<class-string<Pressure>> */
    private const PRESSURE_FQN_S = [
        Pascal::class,
        Bar::class,
        Hectopascal::class,
        Kilopascal::class,
        Millibar::class,
        MillimetreOfMercury::class,
        PoundPerSquareInch::class,
        StandardAtmosphere::class,
        Torr::class,
    ];

    /** @dataProvider pressureInstances */
    public function testReversibility(Pressure $pressure): void
    {
        static::assertEqualsWithDelta($pressure, $pressure::fromPascalValue($pressure->toPascalValue()), 0.000001);
    }

    /** @return iterable<class-string<Pressure>, array<Pressure>> */
    public function pressureInstances(): iterable
    {
        foreach (self::PRESSURE_FQN_S as $pressureFQN) {
            yield $pressureFQN => [new $pressureFQN(42.0)];
        }
    }

    public function testCorrectConversionRate(): void
    {
        static::assertEqualsWithDelta(new Pascal(42.0), (new Pascal(42.0))->toPascal(), 0.000001);
        static::assertEqualsWithDelta(new Pascal(4200000.0), (new Bar(42.0))->toPascal(), 0.000001);
        static::assertEqualsWithDelta(new Pascal(4200.0), (new Hectopascal(42.0))->toPascal(), 0.000001);
        static::assertEqualsWithDelta(new Pascal(42000.0), (new Kilopascal(42.0))->toPascal(), 0.000001);
        static::assertEqualsWithDelta(new Pascal(4200.0), (new Millibar(42.0))->toPascal(), 0.000001);
        static::assertEqualsWithDelta(new Pascal(5599.540271430001), (new MillimetreOfMercury(42.0))->toPascal(), 0.000001);
        static::assertEqualsWithDelta(new Pascal(289579.806313056), (new PoundPerSquareInch(42.0))->toPascal(), 0.000001);
        static::assertEqualsWithDelta(new Pascal(4255650.0), (new StandardAtmosphere(42.0))->toPascal(), 0.000001);
        static::assertEqualsWithDelta(new Pascal(5599.539473682), (new Torr(42.0))->toPascal(), 0.000001);
    }
}
