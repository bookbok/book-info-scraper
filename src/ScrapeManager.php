<?php

namespace BookBok\BookInfoScraper;

use BookBok\BookInfoScraper\Event\DataProviderExceptionEvent;
use BookBok\BookInfoScraper\Exception\DataProviderException;
use BookBok\BookInfoScraper\Information\BookInterface;
use Psr\EventDispatcher\EventDispatcherInterface;

/**
 * Management scraper objects.
 *
 * @package BookBok\BookInfoScraper
 * @license https://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */
class ScrapeManager
{
    /**
     * @var EventDispatcherInterface|null
     */
    private $eventDispatcher;

    /**
     * @var \SplPriorityQueue|ScraperInterface[]
     */
    private $scrapers;

    /**
     * Constructor.
     *
     * @param EventDispatcherInterface $eventDispatcher The event dispatcher
     */
    public function __construct(?EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
        $this->scrapers = new \SplPriorityQueue();
    }

    /**
     * Add the book information scraper.
     *
     * @param ScraperInterface $scraper The book information scraper
     * @param int              $priority The priority
     *
     * @return $this
     */
    public function add(ScraperInterface $scraper, int $priority = 0): ScrapeManager
    {
        $this->scrapers->insert($scraper, $priority);

        return $this;
    }

    /**
     * Returns the book.
     *
     * @param string   $id The book identifier
     * @param callable $filter The callback to determine books to ignore
     * @param bool     $ignoreException If true ignore exceptions raised by the provider
     *
     * @return BookInterface|null
     *
     * @throws DataProviderException
     */
    public function scrape(
        string $id,
        callable $filter = null,
        bool $ignoreException = false
    ): ?BookInterface {
        foreach ($this->scrapers as $scraper) {
            $book = null;

            try {
                $book = $scraper->scrape($id);
            } catch (DataProviderException $e) {
                if (null !== $this->eventDispatcher) {
                    $this->eventDispatcher->dispatch(
                        new DataProviderExceptionEvent($scraper, $e)
                    );
                }

                if (!$ignoreException) {
                    throw $e;
                }
            }

            if (null !== $book && null !== $filter && !($filter($book))) {
                $book = null;
            }

            if (null !== $book) {
                return $book;
            }
        }

        return null;
    }
}
