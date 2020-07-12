<?php

namespace Tests\Unit\Information\ImmutableAuthor;

use BookBok\BookInfoScraper\Information\ImmutableAuthor;
use PHPUnit\Framework\TestCase;

class WithNameTest extends TestCase
{
    /**
     * @dataProvider dataProviderPossibleToSetValidValueAndReturnCloneInstance
     * @param string $value
     */
    public function testPossibleToSetValidValueAndReturnCloneInstance($value)
    {
        $author = (new ImmutableAuthor())->withName("abc");
        $cloneAuthor = $author->withName($value);

        $this->assertSame("abc", $author->getName());
        $this->assertSame($value, $cloneAuthor->getName());
        $this->assertNotSame($cloneAuthor, $author);
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

        (new ImmutableAuthor())->withName($value);
    }

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
