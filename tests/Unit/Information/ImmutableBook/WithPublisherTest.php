<?php

namespace Tests\Unit\Information\ImmutableBook;

use BookBok\BookInfoScraper\Information\ImmutableBook;
use PHPUnit\Framework\TestCase;

class WithPublisherTest extends TestCase
{
    /**
     * @dataProvider dataProviderPossibleToSetValidValueAndReturnCloneInstance
     * @param string|null $value
     * @return void
     */
    public function testPossibleToSetValidValueAndReturnCloneInstance(?string $value): void
    {
        $book = (new ImmutableBook())->withPublisher("abc");
        $cloneBook = $book->withPublisher($value);

        $this->assertSame("abc", $book->getPublisher());
        $this->assertSame($value, $cloneBook->getPublisher());
        $this->assertNotSame($cloneBook, $book);
    }

    /**
     * @return array<array{string|null}>
     */
    public function dataProviderPossibleToSetValidValueAndReturnCloneInstance(): array
    {
        return [
            ["def"],
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

        (new ImmutableBook())->withPublisher($value);
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
