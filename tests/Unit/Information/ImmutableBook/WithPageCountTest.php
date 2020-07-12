<?php

namespace Tests\Unit\Information\ImmutableBook;

use BookBok\BookInfoScraper\Information\ImmutableBook;
use PHPUnit\Framework\TestCase;

class WithPageCountTest extends TestCase
{
    /**
     * @dataProvider dataProviderPossibleToSetValidValueAndReturnCloneInstance
     * @param int|null $value
     */
    public function testPossibleToSetValidValueAndReturnCloneInstance($value)
    {
        $book = (new ImmutableBook())->withPageCount(123);
        $cloneBook = $book->withPageCount($value);

        $this->assertSame(123, $book->getPageCount());
        $this->assertSame($value, $cloneBook->getPageCount());
        $this->assertNotSame($cloneBook, $book);
    }

    public function dataProviderPossibleToSetValidValueAndReturnCloneInstance(): array
    {
        return [
            [456],
            [null],
        ];
    }

    /**
     * @dataProvider dataProviderThrowExceptionWhenSetInvalidValue
     * @param mixed $value
     * @param string $message
     */
    public function testThrowExceptionWhenSetInvalidValue($value, $message)
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage($message);

        (new ImmutableBook())->withPageCount($value);
    }

    public function dataProviderThrowExceptionWhenSetInvalidValue(): array
    {
        return [
            "0 page books cannot be set" => [0, "Cannot set a number smaller than 1."],
        ];
    }
}
