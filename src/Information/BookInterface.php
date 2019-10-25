<?php

/**
 * bookbok/book-info-scraper
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright (c) BookBok
 * @license MIT
 * @since 1.0.0
 */

namespace BookBok\BookInfoScraper\Information;

/**
 *
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
