<?php

namespace Tests\Unit\Information\AbstractAuthor;

use BookBok\BookInfoScraper\Exception\InformationInstanceException;
use BookBok\BookInfoScraper\Information\AbstractAuthor;
use PHPUnit\Framework\TestCase;

class GetNameTest extends TestCase
{
    /**
     * @return void
     */
    public function testReturnsPropertyValue(): void
    {
        $author = new class extends AbstractAuthor {
            public function __construct()
            {
                $this->name = "abc";
            }
        };

        $this->assertSame("abc", $author->getName());
    }

    /**
     * @return void
     */
    public function testThrowExceptionPropertyValueIsNull(): void
    {
        $this->expectException(InformationInstanceException::class);
        $this->expectExceptionMessage("Name is not set.");

        $author = (new class extends AbstractAuthor {
        });

        $author->getName();
    }
}
