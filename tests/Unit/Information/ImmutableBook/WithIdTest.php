<?php

namespace Tests\Unit\Information\ImmutableBook;

use BookBok\BookInfoScraper\Information\ImmutableBook;
use PHPUnit\Framework\TestCase;

class WithIdTest extends TestCase
{
    /**
     * @dataProvider dataProviderPossibleToSetValidValueAndReturnCloneInstance
     * @param string $value
     */
    public function testPossibleToSetValidValueAndReturnCloneInstance($value)
    {
        $book = (new ImmutableBook())->withId("abc");
        $cloneBook = $book->withId($value);

        $this->assertSame("abc", $book->getId());
        $this->assertSame($value, $cloneBook->getId());
        $this->assertNotSame($cloneBook, $book);
    }

    public function dataProviderPossibleToSetValidValueAndReturnCloneInstance(): array
    {
        return [
            ["def"],
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

        (new ImmutableBook())->withId($value);
    }

    public function dataProviderThrowExceptionWhenSetInvalidValue(): array
    {
        return [
            "Empty string" => ["", "Cannot set empty string."],
        ];
    }
}
