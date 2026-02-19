<?php
declare(strict_types=1);

namespace MeasurementUnit\Tests\Unit;

use PHPUnit\Framework\TestCase;
use MeasurementUnit\Customise;
use MeasurementUnit\Length\Meter;
use MeasurementUnit\Length\Fathom;

/**
 * @coversDefaultClass \MeasurementUnit\Customise
 */
class CustomiseTest extends TestCase
{
    private string $originalMeterSymbol;

    private string $originalFathomSymbol;

    protected function setUp(): void
    {
        // Store original symbols
        $this->originalMeterSymbol  = Meter::getSymbol();
        $this->originalFathomSymbol = Fathom::getSymbol();
    }

    /**
     * @covers ::unitSymbols
     */
    public function testUnitSymbolsChangesSymbolsSuccessfully(): void
    {
        Customise::unitSymbols([
            Meter::class  => 'METRE',
            Fathom::class => 'FATHOM'
        ]);

        static::assertSame('METRE', Meter::getSymbol());
        static::assertSame('FATHOM', Fathom::getSymbol());
        static::assertNotEquals($this->originalMeterSymbol, Meter::getSymbol());
        static::assertNotEquals($this->originalFathomSymbol, Fathom::getSymbol());
    }

    /**
     * @covers ::unitSymbols
     */
    public function testUnitSymbolsThrowsExceptionForNonExistentClass(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Class NonExistentClass does not exist.');

        Customise::unitSymbols([
            'NonExistentClass' => 'SYMBOL'
        ]);
    }

    /**
     * @covers ::unitSymbols
     */
    public function testUnitSymbolsThrowsExceptionForInvalidMeasurementUnitClass(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Class stdClass does not exist.');

        Customise::unitSymbols([
            \stdClass::class => 'SYMBOL'
        ]);
    }

    protected function tearDown(): void
    {
        // Reset to original symbols
        Meter::setSymbol($this->originalMeterSymbol);
        Fathom::setSymbol($this->originalFathomSymbol);
    }
}
