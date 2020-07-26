<?php

namespace Tests\Unit\Information\ImmutableBook;

use BookBok\BookInfoScraper\Information\ImmutableBook;
use PHPUnit\Framework\TestCase;

class WithPublishedCountryCodeTest extends TestCase
{
    /**
     * @dataProvider dataProviderPossibleToSetValidValueAndReturnCloneInstance
     * @param string|null $value
     * @return void
     */
    public function testPossibleToSetValidValueAndReturnCloneInstance(?string $value): void
    {
        $book = (new ImmutableBook())->withPublishedCountryCode("US");
        $cloneBook = $book->withPublishedCountryCode($value);

        $this->assertSame("US", $book->getPublishedCountryCode());
        $this->assertSame($value, $cloneBook->getPublishedCountryCode());
        $this->assertNotSame($cloneBook, $book);
    }

    /**
     * @return array<array{string|null}>
     */
    public function dataProviderPossibleToSetValidValueAndReturnCloneInstance(): array
    {
        return [
            ["JP"],
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

        (new ImmutableBook())->withPublishedCountryCode($value);
    }

    /**
     * @return array<array{string,string}>
     */
    public function dataProviderThrowExceptionWhenSetInvalidValue(): array
    {
        return [
            "Empty string" => [
                "",
                "Cannot set string that does not match the ISO 3166-1 Country Codes alpha-2 code format.",
            ],
            "Lowercase pair" => [
                "jp",
                "Cannot set string that does not match the ISO 3166-1 Country Codes alpha-2 code format.",
            ],
            "Contain lowercase" => [
                "jP",
                "Cannot set string that does not match the ISO 3166-1 Country Codes alpha-2 code format.",
            ],
            "3 chars" => [
                "USA",
                "Cannot set string that does not match the ISO 3166-1 Country Codes alpha-2 code format.",
            ],
        ];
    }
}
