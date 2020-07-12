<?php

namespace Tests\Unit\Information\AbstractBook;

use BookBok\BookInfoScraper\Exception\InformationInstanceException;
use BookBok\BookInfoScraper\Information\AbstractBook;
use PHPUnit\Framework\TestCase;

class GetIdTest extends TestCase
{
    public function testReturnsPropertyValue()
    {
        $book = new class extends AbstractBook {
            public function __construct()
            {
                $this->id = "abc";
            }
        };

        $this->assertSame("abc", $book->getId());
    }

    public function testThrowExceptionPropertyValueIsNull()
    {
        $this->expectException(InformationInstanceException::class);
        $this->expectExceptionMessage("Id is not set.");

        (new class extends AbstractBook{})->getId();
    }
}
