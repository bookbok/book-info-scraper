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
namespace BookBok\BookInfoScraper\Information;

/**
 *
 */
class Book implements BookInterface{

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string|null
     */
    private $subTitle;

    /**
     * @var string|null
     */
    private $description;

    /**
     * @var string|null
     */
    private $coverUri;

    /**
     * @var int|null
     */
    private $pageCount;

    /**
     * @var AuthorInterface[]|null
     */
    private $authors;

    /**
     * @var string|null
     */
    private $publisher;

    /**
     * @var \DateTime|null
     */
    private $publishedAt;

    /**
     * @var int|null
     */
    private $price;

    /**
     * @var string|null
     */
    private $priceCode;

    /**
     * Constructor.
     *
     * @param   string  $id
     * @param   string  $title
     */
    public function __construct(string $id, string $title){
        $this->id       = $id;
        $this->title    = $title;
    }

    /**
     * {@inheritdoc}
     */
    public function getId(): string{
        return $this->id;
    }

    /**
     * Set Id.
     *
     * @param   string  $id
     *
     * @return  $this
     */
    public function setId(string $id): self{
        $this->id   = $id;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle(): string{
        return $this->title;
    }

    /**
     * Set Title.
     *
     * @param   string  $title
     *
     * @return  $this
     */
    public function setTitle(string $title): self{
        $this->title    = $title;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSubTitle(): ?string{
        return $this->subTitle;
    }

    /**
     * Set SubTitle.
     *
     * @param   string|null $subTitle
     *
     * @return  $this
     */
    public function setSubTitle(?string $subTitle): self{
        $this->subTitle = $subTitle;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription(): ?string{
        return $this->description;
    }

    /**
     * Set Description.
     *
     * @param   string|null $description
     *
     * @return  $this
     */
    public function setDescription(?string $description): self{
        $this->description  = $description;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCoverUri(): ?string{
        return $this->coverUri;
    }

    /**
     * Set CoverUri.
     *
     * @param   string|null $coverUri
     *
     * @return  $this
     */
    public function setCoverUri(?string $coverUri): self{
        $this->coverUri = $coverUri;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPageCount(): ?int{
        return $this->pageCount;
    }

    /**
     * Set PageCount.
     *
     * @param   int|null    $pageCount
     *
     * @return  $this
     */
    public function setPageCount(?int $pageCount): self{
        $this->pageCount    = $pageCount;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthors(): ?array{
        return $this->authors;
    }

    /**
     * Set Authors.
     *
     * @param   AuthorInterface[]|null  $authors
     *
     * @return  $this
     */
    public function setAuthors(?array $authors): self{
        foreach($authors as $author){
            if(!is_object($author) || !is_subclass_of($author, AuthorInterface::class)){
                throw new \InvalidArgumentException();
            }
        }

        $this->authors  = $authors;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPublisher(): ?string{
        return $this->publisher;
    }

    /**
     * Set Publisher.
     *
     * @param   string|null $publisher
     *
     * @return  $this
     */
    public function setPublisher(?string $publisher): self{
        $this->publisher    = $publisher;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPublishedAt(): ?\DateTime{
        return $this->publishedAt;
    }

    /**
     * Set PublishedAt.
     *
     * @param   \DateTime|null  $publishedAt
     *
     * @return  $this
     */
    public function setPublishedAt(?\DateTime $publishedAt): self{
        $this->publishedAt  = $publishedAt;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPrice(): ?int{
        return $this->price;
    }

    /**
     * Set Price.
     *
     * @param   int|null    $price
     *
     * @return  $this
     */
    public function setPrice(?int $price): self{
        $this->price    = $price;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPriceCode(): ?string{
        return $this->priceCode;
    }

    /**
     * Set PriceCode.
     *
     * @param   string|null $priceCode
     *
     * @return  $this
     */
    public function setPriceCode(?string $priceCode): self{
        $this->priceCode    = $priceCode;

        return $this;
    }
}
