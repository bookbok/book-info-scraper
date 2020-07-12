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
     * - MUST NOT return empty string.
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Returns the author roles.
     *
     * - MUST NOT return empty array.
     * - empty string MUST NOT contain.
     *
     * @return string[]|null
     */
    public function getRoles(): ?array;
}
