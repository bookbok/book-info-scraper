<?php

namespace BookBok\BookInfoScraper\Exception;

/**
 * Exception thrown when Author or Book instance creation has failed.
 *
 * @package BookBok\BookInfoScraper
 * @license MIT
 */
class InformationInstanceException extends \LogicException implements BookInfoScraperExceptionInterface
{
}
