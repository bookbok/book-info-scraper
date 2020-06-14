<?php

namespace BookBok\BookInfoScraper\Information;

/**
 * Author information interface.
 *
 * @package BookBok\BookInfoScraper
 * @license MIT
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
