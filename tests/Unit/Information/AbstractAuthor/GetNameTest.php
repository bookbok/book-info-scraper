<?php

namespace Tests\Unit\Information\AbstractAuthor;

use BookBok\BookInfoScraper\Exception\InformationInstanceException;
use BookBok\BookInfoScraper\Information\AbstractAuthor;
use PHPUnit\Framework\TestCase;

class GetNameTest extends TestCase
{
    public function testReturnsPropertyValue()
    {
        $author = new class extends AbstractAuthor {
            public function __construct()
            {
                $this->name = "abc";
            }
        };

        $this->assertSame("abc", $author->getName());
    }

    public function testThrowExceptionPropertyValueIsNull()
    {
        $this->expectException(InformationInstanceException::class);
        $this->expectExceptionMessage("Name is not set.");

        (new class extends AbstractAuthor{})->getName();
    }
}
