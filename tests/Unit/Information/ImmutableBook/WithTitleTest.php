<?php

namespace Tests\Unit\Information\ImmutableBook;

use BookBok\BookInfoScraper\Information\ImmutableBook;
use PHPUnit\Framework\TestCase;

class WithTitleTest extends TestCase
{
    /**
     * @dataProvider dataProviderPossibleToSetValidValueAndReturnCloneInstance
     * @param string $value
     * @return void
     */
    public function testPossibleToSetValidValueAndReturnCloneInstance(string $value): void
    {
        $book = (new ImmutableBook())->withTitle("abc");
        $cloneBook = $book->withTitle($value);

        $this->assertSame("abc", $book->getTitle());
        $this->assertSame($value, $cloneBook->getTitle());
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

        (new ImmutableBook())->withTitle($value);
    }

    /**
     * @return array<array{string,string}>
     */
    public function dataProviderThrowExceptionWhenSetInvalidValue(): array
    {
        return [
            "Empty string" => ["", "Cannot set empty string."],
            "Contain LF" => ["abc\ndef", "Cannot contain line breaks."],
            "Contain CR " => ["abc\rdef", "Cannot contain line breaks."],
            "Contain CRLF" => ["abc\r\ndef", "Cannot contain line breaks."],
            "Contain multi line break code" => ["abc\r\ndef\rghi\njkl", "Cannot contain line breaks."],
            "Line break" => ["\n", "Cannot contain line breaks."],
        ];
    }
}
