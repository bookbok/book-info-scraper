<?php

namespace Tests\Unit\Information\AbstractBook;

use BookBok\BookInfoScraper\Information\AbstractBook;
use PHPUnit\Framework\TestCase;

class GetPriceTest extends TestCase
{
    /**
     * @dataProvider dataProviderReturnsPropertyValue
     * @param string|null $value
     */
    public function testReturnsPropertyValue($value)
    {
        $book = new class ($value) extends AbstractBook {
            public function __construct($value)
            {
                $this->price = $value;
            }
        };

        $this->assertSame($value, $book->getPrice());
    }

    public function dataProviderReturnsPropertyValue(): array
    {
        return [
            [123.45],
            [null]
        ];
    }
}
