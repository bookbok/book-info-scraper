<?php

namespace BookBok\BookInfoScraper;

/**
 * Book scraper with isbn code.
 *
 * @package BookBok\BookInfoScraper
 * @license https://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */
abstract class AbstractIsbnScraper implements ScraperInterface
{
    /**
     * {@inheritdoc}
     */
    public function support(string $id): bool
    {
        return 1 === preg_match("/\A97[89][0-9]{10}\z/", $id);
    }
}
