<?php

/**
 * bookbok/book-info-scraper
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright (c) BookBok
 * @license MIT
 * @since 1.0.0
 */

namespace BookBok\BookInfoScraper\Information;

/**
 *
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
     * @return string[]
     */
    public function getRoles(): array;
}
