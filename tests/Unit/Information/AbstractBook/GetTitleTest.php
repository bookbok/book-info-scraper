<?php

namespace Tests\Unit\Information\AbstractBook;

use BookBok\BookInfoScraper\Exception\InformationInstanceException;
use BookBok\BookInfoScraper\Information\AbstractBook;
use PHPUnit\Framework\TestCase;

class GetTitleTest extends TestCase
{
    /**
     * @return void
     */
    public function testReturnsPropertyValue(): void
    {
        $book = new class extends AbstractBook {
            public function __construct()
            {
                $this->title = "abc";
            }
        };

        $this->assertSame("abc", $book->getTitle());
    }

    /**
     * @return void
     */
    public function testThrowExceptionPropertyValueIsNull(): void
    {
        $this->expectException(InformationInstanceException::class);
        $this->expectExceptionMessage("Title is not set.");

        $book = (new class extends AbstractBook{
        });

        $book->getTitle();
    }
}
