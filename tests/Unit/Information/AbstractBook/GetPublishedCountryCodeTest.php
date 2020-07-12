<?php

namespace Tests\Unit\Information\AbstractBook;

use BookBok\BookInfoScraper\Information\AbstractBook;
use PHPUnit\Framework\TestCase;

class GetPublishedCountryCodeTest extends TestCase
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
                $this->publishedCountryCode = $value;
            }
        };

        $this->assertSame($value, $book->getPublishedCountryCode());
    }

    public function dataProviderReturnsPropertyValue(): array
    {
        return [
            ["JP"],
            [null]
        ];
    }
}
