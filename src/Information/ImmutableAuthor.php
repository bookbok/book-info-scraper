<?php

namespace BookBok\BookInfoScraper\Information;

/**
 * Immutable author information.
 *
 * @package BookBok\BookInfoScraper
 * @license MIT
 */
class ImmutableAuthor extends AbstractAuthor
{
    /**
     * Returns an instance with the specific name.
     *
     * @param string $name The name.
     *
     * @return ImmutableAuthor
     */
    public function withName(string $name): ImmutableAuthor
    {
        if ($name === "") {
            throw new \InvalidArgumentException("Cannot set empty string.");
        }

        if (mb_strpos($name, "\n") !== false || mb_strpos($name, "\r") !== false) {
            throw new \InvalidArgumentException("Cannot contain line breaks.");
        }

        $cloneAuthor = clone $this;
        $cloneAuthor->name = $name;

        return $cloneAuthor;
    }

    /**
     * Returns an instance with the specific roles.
     *
     * @param string[]|null $roles The roles.
     *
     * @return ImmutableAuthor
     */
    public function withRoles(?array $roles): ImmutableAuthor
    {
        if ($roles !== null) {
            if (count($roles) === 0) {
                throw new \InvalidArgumentException("Cannot set empty array.");
            }

            if ($roles !== array_values($roles)) {
                throw new \InvalidArgumentException("Cannot set associative array.");
            }

            foreach ($roles as $role) {
                if ($role === "") {
                    throw new \InvalidArgumentException("Cannot set empty string.");
                }
            }
        }

        $cloneAuthor = clone $this;
        $cloneAuthor->roles = $roles;

        return $cloneAuthor;
    }
}
