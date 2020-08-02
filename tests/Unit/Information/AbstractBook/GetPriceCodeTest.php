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
     * @return void
     */
    public function testReturnsPropertyValue(?float $price, ?string $priceCode): void
    {
        $book = new class ($price, $priceCode) extends AbstractBook {
            public function __construct(?float $price, ?string $priceCode)
            {
                $this->price = $price;
                $this->priceCode = $priceCode;
            }
        };

        $this->assertSame($priceCode, $book->getPriceCode());
    }

    /**
     * @return array<array{float|null,string|null}>
     */
    public function dataProviderReturnsPropertyValue(): array
    {
        return [
            [123.45, "USD"],
            [null, "USD"],
            [null, null],
        ];
    }

    /**
     * @return void
     */
    public function testThrowExceptionPropertyValueIsInvalid(): void
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
