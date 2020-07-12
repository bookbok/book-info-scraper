<?php

namespace Tests\Unit\Information\ImmutableBook;

use BookBok\BookInfoScraper\Information\ImmutableBook;
use PHPUnit\Framework\TestCase;

class WithCoverUriTest extends TestCase
{
    /**
     * @dataProvider dataProviderPossibleToSetValidValueAndReturnCloneInstance
     * @param string|null $value
     */
    public function testPossibleToSetValidValueAndReturnCloneInstance($value)
    {
        $book = (new ImmutableBook())->withCoverUri("https://example.com/abc");
        $cloneBook = $book->withCoverUri($value);

        $this->assertSame("https://example.com/abc", $book->getCoverUri());
        $this->assertSame($value, $cloneBook->getCoverUri());
        $this->assertNotSame($cloneBook, $book);
    }

    public function dataProviderPossibleToSetValidValueAndReturnCloneInstance(): array
    {
        return [
            ["http://example.com/def"],
            ["https://example.com/def"],
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

        (new ImmutableBook())->withCoverUri($value);
    }

    public function dataProviderThrowExceptionWhenSetInvalidValue(): array
    {
        return [
            "Empty string" => ["", "Cannot set empty string."],
            "Not start with https?://" => ["abc", "It is not possible to set string that does not start with https?://"],
        ];
    }
}
