<?php

namespace Tests\Unit\Information\ImmutableBook;

use BookBok\BookInfoScraper\Information\ImmutableBook;
use PHPUnit\Framework\TestCase;

class WithDescriptionTest extends TestCase
{
    /**
     * @dataProvider dataProviderPossibleToSetValidValueAndReturnCloneInstance
     * @param string|null $value
     */
    public function testPossibleToSetValidValueAndReturnCloneInstance($value)
    {
        $book = (new ImmutableBook())->withDescription("abc");
        $cloneBook = $book->withDescription($value);

        $this->assertSame("abc", $book->getDescription());
        $this->assertSame($value, $cloneBook->getDescription());
        $this->assertNotSame($cloneBook, $book);
    }

    public function dataProviderPossibleToSetValidValueAndReturnCloneInstance(): array
    {
        return [
            ["def"],
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

        (new ImmutableBook())->withDescription($value);
    }

    public function dataProviderThrowExceptionWhenSetInvalidValue(): array
    {
        return [
            "Empty string" => ["", "Cannot set empty string."],
        ];
    }

    public function testConvertLineBreakCRLFAndCR2LF()
    {
        $book = (new ImmutableBook())->withDescription("\r\rabc\rdef\r\nghi\r\r\n\njkl\n");

        $this->assertSame("\n\nabc\ndef\nghi\n\n\njkl\n", $book->getDescription());
    }
}
