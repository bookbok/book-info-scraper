<?php

namespace Tests\Unit\Information\AbstractBook;

use BookBok\BookInfoScraper\Information\AbstractBook;
use PHPUnit\Framework\TestCase;

class GetPublisherTest extends TestCase
{
    /**
     * @dataProvider dataProviderReturnsPropertyValue
     * @param string|null $value
     * @return void
     */
    public function testReturnsPropertyValue(?string $value): void
    {
        $book = new class ($value) extends AbstractBook {
            public function __construct(?string $value)
            {
                $this->publisher = $value;
            }
        };

        $this->assertSame($value, $book->getPublisher());
    }

    /**
     * @return array<array{string|null}>
     */
    public function dataProviderReturnsPropertyValue(): array
    {
        return [
            ["abc"],
            [null]
        ];
    }
}
