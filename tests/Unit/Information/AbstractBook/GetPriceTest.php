<?php

namespace Tests\Unit\Information\AbstractBook;

use BookBok\BookInfoScraper\Information\AbstractBook;
use PHPUnit\Framework\TestCase;

class GetPriceTest extends TestCase
{
    /**
     * @dataProvider dataProviderReturnsPropertyValue
     * @param float|null $value
     * @return void
     */
    public function testReturnsPropertyValue(?float $value): void
    {
        $book = new class ($value) extends AbstractBook {
            public function __construct(?float $value)
            {
                $this->price = $value;
            }
        };

        $this->assertSame($value, $book->getPrice());
    }

    /**
     * @return array<array{float|null}>
     */
    public function dataProviderReturnsPropertyValue(): array
    {
        return [
            [123.45],
            [null]
        ];
    }
}
