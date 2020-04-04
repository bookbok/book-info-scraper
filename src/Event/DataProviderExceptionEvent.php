<?php

namespace BookBok\BookInfoScraper\Event;

use BookBok\BookInfoScraper\Exception\DataProviderException;
use BookBok\BookInfoScraper\ScraperInterface;

/**
 * Event fired when there is a problem when fetching book information.
 *
 * @package BookBok\BookInfoScraper
 * @license https://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */
class DataProviderExceptionEvent implements BookInfoScraperEventInterface
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
