<?php

namespace Tests\Unit\Information\ImmutableBook;

use BookBok\BookInfoScraper\Information\ImmutableBook;
use PHPUnit\Framework\TestCase;

class WithIdTest extends TestCase
{
    /**
     * @dataProvider dataProviderPossibleToSetValidValueAndReturnCloneInstance
     * @param string $value
     * @return void
     */
    public function testPossibleToSetValidValueAndReturnCloneInstance(string $value): void
    {
        $book = (new ImmutableBook())->withId("abc");
        $cloneBook = $book->withId($value);

        $this->assertSame("abc", $book->getId());
        $this->assertSame($value, $cloneBook->getId());
        $this->assertNotSame($cloneBook, $book);
    }

    /**
     * @return array<array{string}>
     */
    public function dataProviderPossibleToSetValidValueAndReturnCloneInstance(): array
    {
        return [
            ["def"],
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

        (new ImmutableBook())->withId($value);
    }

    /**
     * @return array<array{string,string}>
     */
    public function dataProviderThrowExceptionWhenSetInvalidValue(): array
    {
        return [
            "Empty string" => ["", "Cannot set empty string."],
        ];
    }
}
