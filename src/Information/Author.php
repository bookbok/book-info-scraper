<?php

namespace BookBok\BookInfoScraper\Information;

/**
 * Author information.
 *
 * @package BookBok\BookInfoScraper
 * @license https://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
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
    public function __construct(string $name, ?array $roles)
    {
        $this->setName($name)->setRoles($roles);
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
        if ('' === $name) {
            throw new \InvalidArgumentException();
        }

        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getRoles(): ?array
    {
        return $this->roles;
    }

    /**
     * Set the author roles.
     *
     * @param string[]|null $roles The author roles
     *
     * @return $this
     */
    public function setRoles(?array $roles): Author
    {
        if (null === $roles) {
            $this->roles = null;

            return $this;
        }

        if (0 === count($roles)) {
            throw new \InvalidArgumentException();
        }

        foreach ($roles as $role) {
            if (!is_string($role) || '' === $role) {
                throw new \InvalidArgumentException();
            }
        }

        $this->roles = $roles;

        return $this;
    }
}
