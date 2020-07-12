<?php

namespace Tests\Unit\Information\AbstractBook;

use BookBok\BookInfoScraper\Information\AbstractBook;
use PHPUnit\Framework\TestCase;

class GetCoverUriTest extends TestCase
{
    /**
     * @dataProvider dataProviderReturnsPropertyValue
     * @param string|null $value
     */
    public function testReturnsPropertyValue($value)
    {
        $book = new class($value) extends AbstractBook {
            public function __construct($value)
            {
                $this->coverUri = $value;
            }
        };

        $this->assertSame($value, $book->getCoverUri());
    }

    public function dataProviderReturnsPropertyValue(): array
    {
        return [
            ["https://example.com/example.png"],
            [null]
        ];
    }
}
