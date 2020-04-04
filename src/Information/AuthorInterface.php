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
    public const S_ROLES = 0b0001;

    /**
     * Returns the supported optional data set.
     *
     * @return int
     */
    public function supported(): int;

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
