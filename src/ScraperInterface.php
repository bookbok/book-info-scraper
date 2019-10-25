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

namespace BookBok\BookInfoScraper;

use BookBok\BookInfoScraper\Exception\DataProviderException;
use BookBok\BookInfoScraper\Information\BookInterface;

/**
 *
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
