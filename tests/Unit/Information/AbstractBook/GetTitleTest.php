<?php

namespace Tests\Unit\Information\AbstractBook;

use BookBok\BookInfoScraper\Exception\InformationInstanceException;
use BookBok\BookInfoScraper\Information\AbstractBook;
use PHPUnit\Framework\TestCase;

class GetTitleTest extends TestCase
{
    public function testReturnsPropertyValue()
    {
        $book = new class extends AbstractBook {
            public function __construct()
            {
                $this->title = "abc";
            }
        };

        $this->assertSame("abc", $book->getTitle());
    }

    public function testThrowExceptionPropertyValueIsNull()
    {
        $this->expectException(InformationInstanceException::class);
        $this->expectExceptionMessage("Title is not set.");

        (new class extends AbstractBook{})->getTitle();
    }
}
