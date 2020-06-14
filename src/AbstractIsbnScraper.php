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
     * @var callable|null
     */
    private $allowableChecker;

    /**
     * {@inheritdoc}
     */
    public function support(string $id): bool
    {
        return 1 === preg_match("/\A97[89][0-9]{10}\z/", $id);
    }

    /**
     * {@inheritDoc}
     */
    public function getAllowableChecker(): ?callable
    {
        return $this->allowableChecker;
    }

    /**
     * Set the allowable checker callback.
     *
     * @param callable $allowableChecker Receives an object that implements BookInterface and returns a bool value.
     *
     * @return void
     */
    public function setAllowableChecker(callable $allowableChecker): void
    {
        $this->allowableChecker = $allowableChecker;
    }
}
