<?php

namespace Tests\Unit\Information\AbstractBook;

use BookBok\BookInfoScraper\Exception\InformationInstanceException;
use BookBok\BookInfoScraper\Information\AbstractBook;
use PHPUnit\Framework\TestCase;

class GetPriceCodeTest extends TestCase
{
    /**
     * @dataProvider dataProviderReturnsPropertyValue
     * @param float|null $price
     * @param string|null $priceCode
     */
    public function testReturnsPropertyValue($price, $priceCode)
    {
        $book = new class ($price, $priceCode) extends AbstractBook {
            public function __construct($price, $priceCode)
            {
                $this->price = $price;
                $this->priceCode = $priceCode;
            }
        };

        $this->assertSame($priceCode, $book->getPriceCode());
    }

    public function dataProviderReturnsPropertyValue(): array
    {
        return [
            [123.45, "USD"],
            [null, "USD"],
            [null, null],
        ];
    }

    public function testThrowExceptionPropertyValueIsInvalid()
    {
        $this->expectException(InformationInstanceException::class);
        $this->expectExceptionMessage("Price is set but price code is not set.");

        (new class extends AbstractBook{
            public function __construct()
            {
                $this->price = 123.45;
                $this->priceCode = null;
            }
        })->getPriceCode();
    }
}
