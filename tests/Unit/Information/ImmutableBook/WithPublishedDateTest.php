<?php

namespace Tests\Unit\Information\ImmutableBook;

use BookBok\BookInfoScraper\Information\ImmutableBook;
use PHPUnit\Framework\TestCase;

class WithPublishedDateTest extends TestCase
{
    /**
     * @dataProvider dataProviderPossibleToSetValidValueAndReturnCloneInstance
     * @param string|null $value
     * @return void
     */
    public function testPossibleToSetValidValueAndReturnCloneInstance(?string $value): void
    {
        $book = (new ImmutableBook())->withPublishedData("2020-01-01");
        $cloneBook = $book->withPublishedData($value);

        $this->assertSame("2020-01-01", $book->getPublishedDate());
        $this->assertSame($value, $cloneBook->getPublishedDate());
        $this->assertNotSame($cloneBook, $book);
    }

    /**
     * @return array<array{string|null}>
     */
    public function dataProviderPossibleToSetValidValueAndReturnCloneInstance(): array
    {
        return [
            ["2020-12-31"],
            ["1900-01-29"],
            [null],
        ];
    }

    /**
     * @dataProvider dataProviderThrowExceptionWhenSetInvalidValue
     * @param string $value
     * @param string $message
     * @return void
     */
    public function testThrowExceptionWhenSetInvalidValue(string $value, string $message): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage($message);

        (new ImmutableBook())->withPublishedData($value);
    }

    /**
     * @return array<array{string,string}>
     */
    public function dataProviderThrowExceptionWhenSetInvalidValue(): array
    {
        return [
            "Month not start 0" => [
                "1999-1-29",
                "Cannot set string that is not YYYY-MM-DD format.",
            ],
            "Day not start 0" => [
                "1999-01-1",
                "Cannot set string that is not YYYY-MM-DD format.",
            ],
            "Month range over" => [
                "1999-13-31",
                "Cannot set string that is not YYYY-MM-DD format.",
            ],
            "Day range over" => [
                "1999-12-32",
                "Cannot set string that is not YYYY-MM-DD format.",
            ],
            "Invalid date" => [
                "1999-02-30",
                "Cannot set invalid date.",
            ],
        ];
    }
}
