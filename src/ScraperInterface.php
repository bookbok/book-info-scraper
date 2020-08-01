<?php

namespace BookBok\BookInfoScraper;

use BookBok\BookInfoScraper\Exception\DataProviderException;
use BookBok\BookInfoScraper\Information\BookInterface;

/**
 * Interfaces that scraper must implement.
 *
 * @package BookBok\BookInfoScraper
 * @license MIT
 */
interface ScraperInterface
{
    /**
     * Returns whether the book identifier is supported.
     *
     * @param string $id The book identifier
     *
     * @return bool
     */
    public function support(string $id): bool;

    /**
     * Returns the allowable checker callback.
     *
     * The fetched book information is passed to this callback,
     * and if false is returned, it is treated as it could not be fetched.
     *
     * @return callable|null
     * @phpstan-return (callable(BookInterface):bool)|null
     */
    public function getAllowableChecker(): ?callable;

    /**
     * Returns the book.
     *
     * @param string $id The book identifier
     *
     * @return BookInterface|null
     *
     * @throws DataProviderException Thrown when failed to receive data from the provider.
     */
    public function scrape(string $id): ?BookInterface;
}
