<?php

namespace Tests\Unit\Information\AbstractBook;

use BookBok\BookInfoScraper\Information\AbstractAuthor;
use BookBok\BookInfoScraper\Information\AbstractBook;
use PHPUnit\Framework\TestCase;

class GetAuthorsTest extends TestCase
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
                $this->authors = $value;
            }
        };

        $this->assertSame($value, $book->getAuthors());
    }

    public function dataProviderReturnsPropertyValue(): array
    {
        return [
            [[$this->createStub(AbstractAuthor::class)]],
            [null]
        ];
    }
}
