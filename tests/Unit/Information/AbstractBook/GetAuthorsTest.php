<?php

namespace Tests\Unit\Information\AbstractBook;

use BookBok\BookInfoScraper\Information\AbstractAuthor;
use BookBok\BookInfoScraper\Information\AbstractBook;
use PHPUnit\Framework\TestCase;

class GetAuthorsTest extends TestCase
{
    /**
     * @dataProvider dataProviderReturnsPropertyValue
     * @param AbstractAuthor[]|null $value
     * @return void
     */
    public function testReturnsPropertyValue(?array $value): void
    {
        $book = new class ($value) extends AbstractBook {
            // @phpstan-ignore-next-line phpstan cant analyze anonymous class phpdoc
            public function __construct(?array $value)
            {
                $this->authors = $value;
            }
        };

        $this->assertSame($value, $book->getAuthors());
    }

    /**
     * @return array<array{AbstractAuthor[]|null}>
     */
    public function dataProviderReturnsPropertyValue(): array
    {
        return [
            [[$this->createStub(AbstractAuthor::class)]],
            [null]
        ];
    }
}
