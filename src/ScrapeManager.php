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

use BookBok\BookInfoScraper\Event\DataProviderExceptionEvent;
use BookBok\BookInfoScraper\Exception\DataProviderException;
use BookBok\BookInfoScraper\Information\BookInterface;
use Psr\EventDispatcher\EventDispatcherInterface;
use SplPriorityQueue;

/**
 *
 */
class ScrapeManager{

    /**
     * @var EventDispatcherInterface|null
     */
    private $dispatcher;

    /**
     * @var SplPriorityQueue|ScraperInterface[]
     */
    private $scrapers;

    /**
     * Constructor.
     *
     * @param EventDispatcherInterface $dispatcher
     */
    public function __construct(?EventDispatcherInterface $dispatcher){
        $this->dispatcher   = $dispatcher;
        $this->scrapers     = new SplPriorityQueue();
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
        $book   = null;

        foreach($this->scrapers as $scraper){
            try{
                $book   = $scraper->scrape($id);
            }catch(DataProviderException $e){
                if(null !== $this->dispatcher){
                    $this->dispatcher->dispatch(new DataProviderExceptionEvent($scraper, $e));
                }

                if(!$ignoreException){
                    throw $e;
                }
            }

            if(null !== $book && null !== $filter && false === $filter($book)){
                $book   = null;
            }

            if(null !== $book){
                break;
            }
        }

        return $book;
    }
}
