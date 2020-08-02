<?php

namespace BookBok\BookInfoScraper\Exception;

/**
 * Exception thrown when there is a problem fetching book information.
 *
 * @package BookBok\BookInfoScraper
 * @license MIT
 *
 * @method \Throwable getPrevious()
 */
class DataProviderException extends \RuntimeException implements BookInfoScraperExceptionInterface
{
    /**
     * Constructor.
     *
     * @param string $message
     * @param int $code
     * @param \Throwable $previous
     */
    public function __construct(string $message, int $code, \Throwable $previous)
    {
        parent::__construct($message, $code, $previous);
    }
}
