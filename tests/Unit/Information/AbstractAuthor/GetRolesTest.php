<?php

namespace Tests\Unit\Information\AbstractAuthor;

use BookBok\BookInfoScraper\Information\AbstractAuthor;
use PHPUnit\Framework\TestCase;

class GetRolesTest extends TestCase
{
    /**
     * @dataProvider dataProviderReturnsPropertyValue
     * @param string[]|null $value
     * @return void
     */
    public function testReturnsPropertyValue(?array $value): void
    {
        $author = new class ($value) extends AbstractAuthor {
            // @phpstan-ignore-next-line phpstan cant analyze anonymous class phpdoc
            public function __construct(?array $value)
            {
                $this->roles = $value;
            }
        };

        $this->assertSame($value, $author->getRoles());
    }

    /**
     * @return array<array{string[]|null}>
     */
    public function dataProviderReturnsPropertyValue(): array
    {
        return [
            [["abc", "def"]],
            [null]
        ];
    }
}
