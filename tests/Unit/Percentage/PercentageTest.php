<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit\Percentage;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Percentage\Percentage;
use MeasurementUnit\Percentage\PercentageInterface;

/**
 * @coversDefaultClass \MeasurementUnit\Percentage\Percentage
 */
class PercentageTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testConstruct(): void
    {
        $percentage = new class (42.0) extends Percentage {
            public static function getSymbol(): string
            {
                return 'unit';
            }
        };

        static::assertSame(42.0, $percentage->value);
    }

    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        $percentage = new class (42.0) extends Percentage {
            public static function getSymbol(): string
            {
                return 'unit';
            }
        };

        static::assertSame('unit', $percentage->getSymbol());
    }

    /**
     * @covers ::__toString
     */
    public function testToString(): void
    {
        $percentage = new class (42.0) extends Percentage {
            public static function getSymbol(): string
            {
                return 'unit';
            }
        };

        static::assertSame('42 unit', $percentage->__toString());
    }
}
