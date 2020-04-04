<?php

namespace BookBok\BookInfoScraper\Information;

/**
 * @package BookBok\BookInfoScraper
 * @license https://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */
interface BookInterface
{
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
     * @see https://www.iso.org/iso-4217-currency-codes.html
     *
     * @return string|null
     */
    public function getPriceCode(): ?string;
}
