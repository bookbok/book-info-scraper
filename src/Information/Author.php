<?php
/**
 * kentoka/book-info-scraper
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
namespace Kentoka\BookInfoScraper\Information;

/**
 *
 */
class Author implements AuthorInterface{

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
     * @param   string  $name
     *
     */
    public function __construct(string $name){
        $this->name = $name;
    }

    /**
     * {@inheritDoc}
     */
    public function getName(): string{
        return $this->name;
    }

    /**
     * Set Name.
     *
     * @param string $name
     *
     * @return $this
     */
    public function setName(string $name): self{
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getRoles(): ?array{
        return $this->roles;
    }

    /**
     * Set Roles.
     *
     * @param string[]|null $roles
     *
     * @return $this
     */
    public function setRoles(?array $roles): self{
        if(null !== $roles){
            foreach($roles as $role){
                if(!is_string($role)){
                    throw new \InvalidArgumentException();
                }
            }
        }

        $this->roles    = $roles;

        return $this;
    }
}
