<?php

namespace BookBok\BookInfoScraper\Information;

/**
 * Book information interface.
 *
 * @package BookBok\BookInfoScraper
 * @license MIT
 */
interface BookInterface
{
    /**
     * Return the book identifier.
     *
     * An example is ISBN.
     *
     * - MUST NOT return empty string.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Returns the title.
     *
     * - MUST NOT return empty string.
     * - MUST NOT contain line breaks.
     *
     * @return string
     */
    public function getTitle(): string;

    /**
     * Returns the sub title.
     *
     * - MUST NOT return empty string.
     * - MUST NOT contain line breaks.
     *
     * @return string|null
     */
    public function getSubTitle(): ?string;

    /**
     * Returns the description.
     *
     * - MUST NOT return empty string.
     * - Newline code MUST be '\n'.
     *
     * @return string|null
     */
    public function getDescription(): ?string;

    /**
     * Returns the cover image uri.
     *
     * - MUST NOT return empty string.
     * - Uri MUST be accessible and viewable.
     *
     * @return string|null
     */
    public function getCoverUri(): ?string;

    /**
     * Return the page count.
     *
     * - MUST return null if page count does not exist.
     * - MUST be greater than or equal to 1.
     *
     * @return int|null
     */
    public function getPageCount(): ?int;

    /**
     * Returns the authors.
     *
     * - MUST NOT return empty array.
     *
     * @return AuthorInterface[]|null
     */
    public function getAuthors(): ?array;

    /**
     * Returns the publisher name.
     *
     * - MUST NOT return empty string.
     * - MUST NOT contain line breaks.
     *
     * @return string|null
     */
    public function getPublisher(): ?string;

    /**
     * Returns the published country code.
     *
     * The value format is ISO 3166-1 Country Codes alpha-2 code.
     *
     * - MUST NOT return empty string.
     *
     * @see https://www.iso.org/glossary-for-iso-3166.html
     *
     * @return string|null
     */
    public function getPublishedCountryCode(): ?string;

    /**
     * Returns the published date.
     *
     * The value format is YYYY-MM-DD.
     *
     * No consideration for timezone.
     * Basically, the timezone of the published area is used.
     *
     * - MUST NOT return empty string.
     *
     * @return string|null
     */
    public function getPublishedDate(): ?string;

    /**
     * Returns the price.
     *
     * - Must be a real number greater than or equal to 0.
     * - If not null, MUST set the price code.
     *
     * @return float|null
     */
    public function getPrice(): ?float;

    /**
     * Returns the price currency code.
     *
     * The value format is ISO 4217 Currency Codes.
     *
     * - MUST not return null, if price is not null.
     *
     * @see https://www.iso.org/iso-4217-currency-codes.html
     *
     * @return string|null
     */
    public function getPriceCode(): ?string;
}
