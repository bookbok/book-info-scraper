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
namespace Kentoka\BookInfoScraper\Event;

use Kentoka\BookInfoScraper\Exception\DataProviderException;
use Kentoka\BookInfoScraper\ScraperInterface;

/**
 *
 */
class DataProviderExceptionEvent extends BookInfoScraperEvent{

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
     * @param ScraperInterface      $scraper
     * @param DataProviderException $e
     */
    public function __construct(
        ScraperInterface $scraper,
        DataProviderException $e
    ){
        $this->scraper  = $scraper;
        $this->e        = $e;
    }

    /**
     * Get scraper.
     *
     * @return ScraperInterface
     */
    public function getScraper(): ScraperInterface{
        return $this->scraper;
    }

    /**
     * Get exception.
     *
     * @return DataProviderException
     */
    public function getException(): DataProviderException{
        return $this->e;
    }
}
