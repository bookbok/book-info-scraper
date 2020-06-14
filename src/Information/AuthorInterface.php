<?php

namespace BookBok\BookInfoScraper\Information;

/**
 * Author information interface.
 *
 * @package BookBok\BookInfoScraper
 * @license https://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */
interface AuthorInterface
{
    /**
     * Returns the author name.
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Returns the author roles.
     *
     * @return string[]|null
     */
    public function getRoles(): ?array;
}
