<?php

namespace Tests\Unit\Information\AbstractBook;

use BookBok\BookInfoScraper\Information\AbstractBook;
use PHPUnit\Framework\TestCase;

class GetSubTitleTest extends TestCase
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
                $this->subTitle = $value;
            }
        };

        $this->assertSame($value, $book->getSubTitle());
    }

    public function dataProviderReturnsPropertyValue(): array
    {
        return [
            ["sub title"],
            [null]
        ];
    }
}
