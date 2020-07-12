<?php

namespace Tests\Unit\Information\ImmutableBook;

use BookBok\BookInfoScraper\Information\ImmutableBook;
use PHPUnit\Framework\TestCase;

class WithPriceTest extends TestCase
{
    /**
     * @dataProvider dataProviderPossibleToSetValidValueAndReturnCloneInstance
     * @param float|null $price
     * @param string|null $priceCode
     */
    public function testPossibleToSetValidValueAndReturnCloneInstance($price, $priceCode)
    {
        $book = (new ImmutableBook())->withPrice(123.45, "USD");
        $cloneBook = $book->withPrice($price, $priceCode);

        $this->assertSame(123.45, $book->getPrice());
        $this->assertSame("USD", $book->getPriceCode());
        $this->assertSame($price, $cloneBook->getPrice());
        $this->assertSame($priceCode, $cloneBook->getPriceCode());
        $this->assertNotSame($cloneBook, $book);
    }

    public function dataProviderPossibleToSetValidValueAndReturnCloneInstance(): array
    {
        return [
            [456.78, "JPY"],
            [null, "JPY"],
            [null, null],
        ];
    }

    /**
     * @dataProvider dataProviderThrowExceptionWhenSetInvalidValue
     * @param float|null $price
     * @param string|null $priceCode
     * @param string $message
     */
    public function testThrowExceptionWhenSetInvalidValue($price, $priceCode, $message)
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage($message);

        (new ImmutableBook())->withPrice($price, $priceCode);
    }

    public function dataProviderThrowExceptionWhenSetInvalidValue(): array
    {
        return [
            "Minus price" => [-1.1, "JPY", "Cannot set a number smaller than 0."],
            "Lowercase" => [123.45, "usd", "Cannot set string that does not match the ISO 4217 Currency Codes format."],
            "Contain lowercase" => [123.45, "UsD", "Cannot set string that does not match the ISO 4217 Currency Codes format."],
            "Without current code" => [456.78, null, "Cannot set price without currency code."],
        ];
    }
}
