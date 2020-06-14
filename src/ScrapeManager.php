<?php

namespace BookBok\BookInfoScraper;

use BookBok\BookInfoScraper\Event\DataProviderExceptionEvent;
use BookBok\BookInfoScraper\Exception\DataProviderException;
use BookBok\BookInfoScraper\Information\BookInterface;
use Psr\EventDispatcher\EventDispatcherInterface;
use SplPriorityQueue;

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
     * @var SplPriorityQueue|ScraperInterface[]
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
        $this->scrapers = new SplPriorityQueue();
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
     * Returns the event dispatcher.
     *
     * @return EventDispatcherInterface|null
     */
    protected function getEventDispatcher(): ?EventDispatcherInterface
    {
        return $this->eventDispatcher;
    }

    /**
     * Returns the scrapers.
     *
     * @return ScraperInterface[]
     */
    protected function getScrapers(): array
    {
        $scrapers = [];

        foreach (clone $this->scrapers as $scraper) {
            $scrapers[] = $scraper;
        }

        return $scrapers;
    }

    /**
     * Returns the fetched book.
     *
     * @param string $id
     * @param bool $ignoreException
     *
     * @return BookInterface|null
     */
    public function find(string $id, bool $ignoreException = false): ?BookInterface
    {
        foreach ($this->getScrapers() as $scraper) {
            $book = null;

            try {
                if ($scraper->support($id)) {
                    $book = $scraper->scrape($id);
                }
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

            if (
                null !== $book
                && ($scraper->getAllowableChecker() === null
                    || $scraper->getAllowableChecker()($book))
            ) {
                return $book;
            }
        }

        return null;
    }

    /**
     * Returns the fetached books.
     *
     * @param string $id
     * @param bool $ignoreException
     *
     * @return BookInterface[]
     */
    public function findAll(string $id, bool $ignoreException = false): array
    {
        $books = [];

        foreach ($this->getScrapers() as $scraper) {
            $book = null;

            try {
                if ($scraper->support($id)) {
                    $book = $scraper->scrape($id);
                }
            } catch (DataProviderException $e) {
                if (null !== $this->getEventDispatcher()) {
                    $this->getEventDispatcher()->dispatch(
                        new DataProviderExceptionEvent($scraper, $e)
                    );
                }

                if (!$ignoreException) {
                    throw $e;
                }
            } finally {
                if (
                    null !== $book
                    && ($scraper->getAllowableChecker() === null
                        || $scraper->getAllowableChecker()($book))
                ) {
                    $books[] = $book;
                }
            }
        }

        return $books;
    }
}
