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
namespace Kentoka\BookInfoScraper;

use Kentoka\BookInfoScraper\Exception\DataProviderException;
use Kentoka\BookInfoScraper\Information\BookInterface;

/**
 *
 */
class ScrapeManager{

    /**
     * @var \SplPriorityQueue|ScraperInterface[]
     */
    private $scrapers;

    /**
     * Constructor.
     */
    public function __construct(){
        $this->scrapers = new \SplPriorityQueue();
    }

    /**
     * Add scraper.
     *
     * @param   ScraperInterface    $scraper
     * @param   int $priority
     *
     * @return  $this
     */
    public function add(ScraperInterface $scraper, int $priority = 0): self{
        $this->scrapers->insert($scraper, $priority);

        return $this;
    }

    /**
     * Fetch book information from registered scrapers.
     *
     * @param   string  $id
     * @param   callable    $filter
     * @param   bool    $ignoreException
     *
     * @return  BookInterface|null
     *
     * @throws  DataProviderException
     */
    public function scrape(
        string $id,
        callable $filter = null,
        bool $ignoreException = false
    ): ?BookInterface{
        foreach($this->scrapers as $scraper){
            $book   = null;

            try{
                $book   = $scraper->scrape($id);
            }catch(DataProviderException $e){
                if(!$ignoreException){
                    throw $e;
                }
            }

            if(null === $book){
                continue;
            }

            if(null !== $filter && false === $filter($book)){
                continue;
            }

            return $book;
        }

        return null;
    }
}
