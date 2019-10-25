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

namespace BookBok\BookInfoScraper\Event;

use BookBok\BookInfoScraper\Exception\DataProviderException;
use BookBok\BookInfoScraper\ScraperInterface;

/**
 *
 */
class DataProviderExceptionEvent extends BookInfoScraperEvent
{
    /**
     * @var ScraperInterface
     */
    private $scraper;

    /**
     * @var DataProviderException
     */
    private $e;

    /**
     * Constructor.
     *
     * @param ScraperInterface      $scraper The scraper
     * @param DataProviderException $e The caught exception
     */
    public function __construct(ScraperInterface $scraper, DataProviderException $e)
    {
        $this->scraper = $scraper;
        $this->e = $e;
    }

    /**
     * Return the scraper.
     *
     * @return ScraperInterface
     */
    public function getScraper(): ScraperInterface
    {
        return $this->scraper;
    }

    /**
     * Returns the caught exception.
     *
     * @return DataProviderException
     */
    public function getException(): DataProviderException
    {
        return $this->e;
    }
}
