<?php

namespace Tests\Unit\Information\AbstractBook;

use BookBok\BookInfoScraper\Information\AbstractBook;
use PHPUnit\Framework\TestCase;

class GetDescriptionTest extends TestCase
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
                $this->description = $value;
            }
        };

        $this->assertSame($value, $book->getDescription());
    }

    /**
     * @return array<array{string|null}>
     */
    public function dataProviderReturnsPropertyValue(): array
    {
        return [
            ["description"],
            [null]
        ];
    }
}
