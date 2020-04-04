<?php

namespace BookBok\BookInfoScraper\Information;

/**
 * @package BookBok\BookInfoScraper
 * @license https://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */
class Book implements BookInterface
{
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
    public function __construct(string $id, string $title)
    {
        $this->id       = $id;
        $this->title    = $title;
    }

    /**
     * {@inheritdoc}
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Set the book identifier.
     *
     * @param string $id The book identifier
     *
     * @return $this
     */
    public function setId(string $id): Book
    {
        $this->id = $id;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the title.
     *
     * @param string $title The title.
     *
     * @return $this
     */
    public function setTitle(string $title): Book
    {
        $this->title = $title;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSubTitle(): ?string
    {
        return $this->subTitle;
    }

    /**
     * Set the sub title.
     *
     * @param string|null $subTitle
     *
     * @return $this
     */
    public function setSubTitle(?string $subTitle): Book
    {
        $this->subTitle = $subTitle;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Set the description.
     *
     * @param string|null $description The description
     *
     * @return $this
     */
    public function setDescription(?string $description): Book
    {
        $this->description = $description;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCoverUri(): ?string
    {
        return $this->coverUri;
    }

    /**
     * Set the cover image uri.
     *
     * @param string|null $coverUri The cover image uri
     *
     * @return $this
     */
    public function setCoverUri(?string $coverUri): Book
    {
        $this->coverUri = $coverUri;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPageCount(): ?int
    {
        return $this->pageCount;
    }

    /**
     * Set the page count.
     *
     * @param int|null $pageCount The page count
     *
     * @return $this
     */
    public function setPageCount(?int $pageCount): Book
    {
        $this->pageCount = $pageCount;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthors(): ?array
    {
        return $this->authors;
    }

    /**
     * Set the authors.
     *
     * @param AuthorInterface[]|null $authors The authors
     *
     * @return $this
     */
    public function setAuthors(?array $authors): Book
    {
        foreach ($authors as $author) {
            if (!is_object($author) || !is_subclass_of($author, AuthorInterface::class)) {
                throw new \InvalidArgumentException();
            }
        }

        $this->authors = $authors;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPublisher(): ?string
    {
        return $this->publisher;
    }

    /**
     * Set the publisher name.
     *
     * @param string|null $publisher The publisher name
     *
     * @return $this
     */
    public function setPublisher(?string $publisher): Book
    {
        $this->publisher = $publisher;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPublishedAt(): ?\DateTime
    {
        return $this->publishedAt;
    }

    /**
     * Set the published datetime.
     *
     * @param \DateTime|null $publishedAt The published datetime
     *
     * @return $this
     */
    public function setPublishedAt(?\DateTime $publishedAt): Book
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPrice(): ?int
    {
        return $this->price;
    }

    /**
     * Set the price.
     *
     * @param int|null $price The price
     *
     * @return $this
     */
    public function setPrice(?int $price): Book
    {
        $this->price = $price;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPriceCode(): ?string
    {
        return $this->priceCode;
    }

    /**
     * Set the price currency code.
     *
     * @param string|null $priceCode The price currency code
     *
     * @return $this
     */
    public function setPriceCode(?string $priceCode): Book
    {
        $this->priceCode = $priceCode;

        return $this;
    }
}
