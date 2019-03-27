<?php
/**
 * kentoka/book-info-scraper
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.
 * Redistributions of files must retain the above copyright notice.
 *
 * @author      Kento Oka <kento-oka@kentoka.com>
 * @copyright   (c) Kento Oka
 * @license     MIT
 * @since       1.0.0
 */
namespace Kentoka\BookInfoScraper\Information;

/**
 *
 */
interface BookInterface{

    /**
     * Get ISBN.
     *
     * If not managed by ISBN, return an arbitrary string identifying the book.
     *
     * @return  string
     */
    public function getId(): string;

    /**
     * Get title.
     *
     * @return  string
     */
    public function getTitle(): string;

    /**
     * Get sub title.
     *
     * @return  string|null
     */
    public function getSubTitle(): ?string;

    /**
     * Get description.
     *
     * @return  string|null
     */
    public function getDescription(): ?string;

    /**
     * Get cover image uri.
     *
     * @return  string|null
     */
    public function getCoverUri(): ?string;

    /**
     * Get cover image uri list.
     *
     * @return  string[]|null
     */
    public function getCoverUriList(): ?array;

    /**
     * Get page count.
     *
     * @return  int|null
     */
    public function getPageCount(): ?int;

    /**
     * Get authors.
     *
     * @return  AuthorInterface[]
     */
    public function getAuthors(): ?array;

    /**
     * Get publisher name.
     *
     * @return  string|null
     */
    public function getPublisher(): ?string;

    /**
     * Get published date.
     *
     * @return  \DateTime|null
     */
    public function getPublishedAt(): ?\DateTime;

    /**
     * Get price.
     *
     * @return  int|null
     */
    public function getPrice(): ?int;

    /**
     * Get price currency code.
     *
     * @return  string|null
     *
     * @see https://www.iso.org/iso-4217-currency-codes.html
     */
    public function getPriceCode(): ?string;
}
