<?php

namespace Tests\Unit\Information\AbstractBook;

use BookBok\BookInfoScraper\Information\AbstractBook;
use PHPUnit\Framework\TestCase;

class GetPublishedDateTest extends TestCase
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
                $this->publishedDate = $value;
            }
        };

        $this->assertSame($value, $book->getPublishedDate());
    }

    public function dataProviderReturnsPropertyValue(): array
    {
        return [
            ["2020-01-01"],
            [null]
        ];
    }
}
