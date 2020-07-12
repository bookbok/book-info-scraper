<?php

namespace Tests\Unit\Information\AbstractBook;

use BookBok\BookInfoScraper\Information\AbstractBook;
use PHPUnit\Framework\TestCase;

class GetDescriptionTest extends TestCase
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
                $this->description = $value;
            }
        };

        $this->assertSame($value, $book->getDescription());
    }

    public function dataProviderReturnsPropertyValue(): array
    {
        return [
            ["description"],
            [null]
        ];
    }
}
