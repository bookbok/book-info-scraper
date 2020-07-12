<?php

namespace BookBok\BookInfoScraper\Information;

use BookBok\BookInfoScraper\Exception\InformationInstanceException;

/**
 * Author information.
 *
 * @package BookBok\BookInfoScraper
 * @license MIT
 */
abstract class AbstractAuthor implements AuthorInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string[]|null
     */
    protected $roles;

    /**
     * {@inheritDoc}
     */
    public function getName(): string
    {
        if ($this->name === null) {
            throw new InformationInstanceException("Name is not set.");
        }

        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function getRoles(): ?array
    {
        return $this->roles;
    }
}
