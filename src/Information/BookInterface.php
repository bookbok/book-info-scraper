<?php

namespace BookBok\BookInfoScraper\Information;

/**
 * Book information interface.
 *
 * @package BookBok\BookInfoScraper
 * @license https://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */
interface BookInterface
{
    public const S_SUB_TITLE    = 0b00000001;
    public const S_DESCRIPTION  = 0b00000010;
    public const S_COVER_URI    = 0b00000100;
    public const S_PAGE_COUNT   = 0b00001000;
    public const S_AUTHORS      = 0b00010000;
    public const S_PUBLISHER    = 0b00100000;
    public const S_PUBLISHED_AT = 0b01000000;
    public const S_PRICE        = 0b10000000;

    /**
     * Returns the supported optional data set.
     *
     * @return int
     */
    public function supported(): int;

    /**
     * Return the book identifier.
     *
     * An example is ISBN.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Returns the title.
     *
     * @return string
     */
    public function getTitle(): string;

    /**
     * Returns the sub title.
     *
     * @return string|null
     */
    public function getSubTitle(): ?string;

    /**
     * Returns the description.
     *
     * @return string|null
     */
    public function getDescription(): ?string;

    /**
     * Returns the cover image uri
     *
     * @return string|null
     */
    public function getCoverUri(): ?string;

    /**
     * Return the page count.
     *
     * @return int|null
     */
    public function getPageCount(): ?int;

    /**
     * Returns the authors.
     *
     * @return AuthorInterface[]|null
     */
    public function getAuthors(): ?array;

    /**
     * Returns the publisher name.
     *
     * @return string|null
     */
    public function getPublisher(): ?string;

    /**
     * Returns the published datetime.
     *
     * @return \DateTime|null
     */
    public function getPublishedAt(): ?\DateTime;

    /**
     * Returns the price.
     *
     * @return int|null
     */
    public function getPrice(): ?int;

    /**
     * Returns the price currency code.
     *
     * If getPrice does not return null, getPriceCode must not return null.
     *
     * @see https://www.iso.org/iso-4217-currency-codes.html
     *
     * @return string|null
     */
    public function getPriceCode(): ?string;
}
