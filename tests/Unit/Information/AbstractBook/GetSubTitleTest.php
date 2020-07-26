<?php

namespace Tests\Unit\Information\AbstractBook;

use BookBok\BookInfoScraper\Information\AbstractBook;
use PHPUnit\Framework\TestCase;

class GetSubTitleTest extends TestCase
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
                $this->subTitle = $value;
            }
        };

        $this->assertSame($value, $book->getSubTitle());
    }

    /**
     * @return array<array{string|null}>
     */
    public function dataProviderReturnsPropertyValue(): array
    {
        return [
            ["sub title"],
            [null]
        ];
    }
}
