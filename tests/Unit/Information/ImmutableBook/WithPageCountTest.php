<?php

namespace Tests\Unit\Information\ImmutableBook;

use BookBok\BookInfoScraper\Information\ImmutableBook;
use PHPUnit\Framework\TestCase;

class WithPageCountTest extends TestCase
{
    /**
     * @dataProvider dataProviderPossibleToSetValidValueAndReturnCloneInstance
     * @param int|null $value
     * @return void
     */
    public function testPossibleToSetValidValueAndReturnCloneInstance(?int $value): void
    {
        $book = (new ImmutableBook())->withPageCount(123);
        $cloneBook = $book->withPageCount($value);

        $this->assertSame(123, $book->getPageCount());
        $this->assertSame($value, $cloneBook->getPageCount());
        $this->assertNotSame($cloneBook, $book);
    }

    /**
     * @return array<array{int|null}>
     */
    public function dataProviderPossibleToSetValidValueAndReturnCloneInstance(): array
    {
        return [
            [456],
            [null],
        ];
    }

    /**
     * @dataProvider dataProviderThrowExceptionWhenSetInvalidValue
     * @param int $value
     * @param string $message
     * @return void
     */
    public function testThrowExceptionWhenSetInvalidValue(int $value, string $message): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage($message);

        (new ImmutableBook())->withPageCount($value);
    }

    /**
     * @return array<array{int,string}>
     */
    public function dataProviderThrowExceptionWhenSetInvalidValue(): array
    {
        return [
            "0 page books cannot be set" => [0, "Cannot set a number smaller than 1."],
        ];
    }
}
