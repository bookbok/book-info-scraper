<?php

namespace Tests\Unit\Information\AbstractBook;

use BookBok\BookInfoScraper\Information\AbstractBook;
use PHPUnit\Framework\TestCase;

class GetPublisherTest extends TestCase
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
                $this->publisher = $value;
            }
        };

        $this->assertSame($value, $book->getPublisher());
    }

    public function dataProviderReturnsPropertyValue(): array
    {
        return [
            ["abc"],
            [null]
        ];
    }
}
