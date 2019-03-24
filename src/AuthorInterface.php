<?php
/**
 * kento-oka/book-scraper
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
namespace Kentoka\BookScraper;

/**
 *
 */
interface AuthorInterface{

    /**
     * Get name.
     *
     * @return  string
     */
    public function getName(): string;

    /**
     * Get role in authors.
     *
     * @return  string
     */
    public function getRole(): ?string;
}
