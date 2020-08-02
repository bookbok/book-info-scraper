<?php

namespace Tests\Unit\Information\AbstractBook;

use BookBok\BookInfoScraper\Information\AbstractBook;
use PHPUnit\Framework\TestCase;

class GetPageCountTest extends TestCase
{
    /**
     * @dataProvider dataProviderReturnsPropertyValue
     * @param int|null $value
     * @return void
     */
    public function testReturnsPropertyValue(?int $value): void
    {
        $book = new class ($value) extends AbstractBook {
            public function __construct(?int $value)
            {
                $this->pageCount = $value;
            }
        };

        $this->assertSame($value, $book->getPageCount());
    }

    /**
     * @return array<array{int|null}>
     */
    public function dataProviderReturnsPropertyValue(): array
    {
        return [
            [123],
            [null]
        ];
    }
}
