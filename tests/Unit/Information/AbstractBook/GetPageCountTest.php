<?php

namespace Tests\Unit\Information\AbstractBook;

use BookBok\BookInfoScraper\Information\AbstractBook;
use PHPUnit\Framework\TestCase;

class GetPageCountTest extends TestCase
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
                $this->pageCount = $value;
            }
        };

        $this->assertSame($value, $book->getPageCount());
    }

    public function dataProviderReturnsPropertyValue(): array
    {
        return [
            [123],
            [null]
        ];
    }
}
