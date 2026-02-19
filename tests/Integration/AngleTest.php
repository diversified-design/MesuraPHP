<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Integration;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Angle\Radian;
use MeasurementUnit\Angle\Degree;
use MeasurementUnit\Angle\Angle;

/** @coversNothing */
class AngleTest extends TestCase
{
    /** @var array<class-string<Angle>> */
    private const ANGLE_FQN_S = [
        Radian::class,
        Degree::class,
    ];

    /** @dataProvider angleInstances */
    public function testReversibility(Angle $angle): void
    {
        static::assertEqualsWithDelta($angle, $angle::fromRadianValue($angle->toRadianValue()), 0.000001);
    }

    /** @return iterable<class-string<Angle>, array<Angle>> */
    public function angleInstances(): iterable
    {
        foreach (self::ANGLE_FQN_S as $angleFQN) {
            yield $angleFQN => [new $angleFQN(42.0)];
        }
    }

    public function testCorrectConversionRate(): void
    {
        static::assertEqualsWithDelta(new Radian(42.0), (new Radian(42.0))->toRadian(), 0.000001);
        static::assertEqualsWithDelta(new Radian(0.733038), (new Degree(42.0))->toRadian(), 0.000001);
    }
}
