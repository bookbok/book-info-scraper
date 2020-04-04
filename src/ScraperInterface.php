<?php

namespace BookBok\BookInfoScraper;

use BookBok\BookInfoScraper\Exception\DataProviderException;
use BookBok\BookInfoScraper\Information\BookInterface;

/**
 * @package BookBok\BookInfoScraper
 * @license https://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
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
