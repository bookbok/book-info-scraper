<?php

namespace Tests\Unit\Information\AbstractAuthor;

use BookBok\BookInfoScraper\Exception\InformationInstanceException;
use BookBok\BookInfoScraper\Information\AbstractAuthor;
use PHPUnit\Framework\TestCase;

class GetRolesTest extends TestCase
{
    /**
     * @dataProvider dataProviderReturnsPropertyValue
     * @param string[]|null $value
     */
    public function testReturnsPropertyValue($value)
    {
        $author = new class ($value) extends AbstractAuthor {
            public function __construct($value)
            {
                $this->roles = $value;
            }
        };

        $this->assertSame($value, $author->getRoles());
    }

    public function dataProviderReturnsPropertyValue(): array
    {
        return [
            [["abc", "def"]],
            [null]
        ];
    }
}
