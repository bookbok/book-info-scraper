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
     * @var string|null
     */
    private $role;

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
     * Get Name.
     *
     * @return  string
     */
    public function getName(): string{
        return $this->name;
    }

    /**
     * Set Name.
     *
     * @param   string  $name
     *
     * @return  $this
     */
    public function setName(string $name): self{
        $this->name = $name;

        return $this;
    }

    /**
     * Get Role.
     *
     * @return  string|null
     */
    public function getRole(): ?string{
        return $this->role;
    }

    /**
     * Set Role.
     *
     * @param   string|null $role
     *
     * @return  $this
     */
    public function setRole(?string $role): self{
        $this->role = $role;

        return $this;
    }
}
