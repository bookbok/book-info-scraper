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
class Author implements AuthorInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string[]|null
     */
    private $roles;

    /**
     * Constructor.
     *
     * @param string   $name The author name
     * @param string[] $roles The author roles
     */
    public function __construct(string $name, array $roles = [])
    {
        $this
            ->setName($name)
            ->setRoles($roles)
        ;
    }

    /**
     * {@inheritDoc}
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the author name.
     *
     * @param string $name The author name
     *
     * @return $this
     */
    public function setName(string $name): Author
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * Set the author roles.
     *
     * @param string[] $roles The author roles
     *
     * @return $this
     */
    public function setRoles(array $roles): Author
    {
        foreach ($roles as $role) {
            if (!is_string($role)) {
                throw new \InvalidArgumentException();
            }
        }

        $this->roles = $roles;

        return $this;
    }
}
