<?php
/**
 * bookbok/book-info-scraper
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
namespace BookBok\BookInfoScraper;

/**
 *
 */
abstract class AbstractIsbnScraper implements ScraperInterface{

    /**
     * {@inheritdoc}
     */
    public function support(string $id): bool{
        return 1 === preg_match("/\A97[89][0-9]{10}\z/", $id);
    }
}
