<?php
/**
 * bookbok/book-info-scraper
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
namespace BookBok\BookInfoScraper;

use BookBok\BookInfoScraper\Exception\DataProviderException;
use BookBok\BookInfoScraper\Information\BookInterface;

/**
 *
 */
interface ScraperInterface{

    /**
     * Check id is supported.
     *
     * @param   string  $id
     *
     * @return  bool
     */
    public function support(string $id): bool;

    /**
     * Fetch book information.
     *
     * @param   string  $id
     *
     * @return  BookInterface|null
     *
     * @throws  DataProviderException
     */
    public function scrape(string $id): ?BookInterface;
}
