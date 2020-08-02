<?php

namespace Tests\Unit\Information\ImmutableBook;

use BookBok\BookInfoScraper\Information\ImmutableBook;
use PHPUnit\Framework\TestCase;

class WithDescriptionTest extends TestCase
{
    /**
     * @dataProvider dataProviderPossibleToSetValidValueAndReturnCloneInstance
     * @param string|null $value
     * @return void
     */
    public function testPossibleToSetValidValueAndReturnCloneInstance(?string $value): void
    {
        $book = (new ImmutableBook())->withDescription("abc");
        $cloneBook = $book->withDescription($value);

        $this->assertSame("abc", $book->getDescription());
        $this->assertSame($value, $cloneBook->getDescription());
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

        (new ImmutableBook())->withDescription($value);
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

    /**
     * @return void
     */
    public function testConvertLineBreakCRLFAndCR2LF(): void
    {
        $book = (new ImmutableBook())->withDescription("\r\rabc\rdef\r\nghi\r\r\n\njkl\n");

        $this->assertSame("\n\nabc\ndef\nghi\n\n\njkl\n", $book->getDescription());
    }
}
