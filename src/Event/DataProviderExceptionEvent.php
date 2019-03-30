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

/**
 *
 */
class DataProviderExceptionEvent extends BookInfoScraperEvent{

    /**
     * @var DataProviderException
     */
    private $e;

    /**
     * Constructor.
     *
     * @param DataProviderException $e
     */
    public function __construct(DataProviderException $e){
        $this->e    = $e;
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
