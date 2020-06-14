<?php

namespace BookBok\BookInfoScraper\Information;

/**
 * Book information.
 *
 * @package BookBok\BookInfoScraper
 * @license MIT
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
        $this->setId($id)->setTitle($title);
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
        if ('' === $id) {
            throw new \InvalidArgumentException();
        }

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
        if ('' === $title) {
            throw new \InvalidArgumentException();
        }

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
        if (null === $subTitle) {
            return $this;
        }

        if ('' === $subTitle) {
            throw new \InvalidArgumentException();
        }

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
        if (null === $description) {
            return $this;
        }

        if ('' === $description) {
            throw new \InvalidArgumentException();
        }

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
        if (null === $coverUri) {
            return $this;
        }

        if ('' === $coverUri) {
            throw new \InvalidArgumentException();
        }

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
        if (null === $pageCount) {
            return $this;
        }

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
        if (null === $authors) {
            $this->authors = null;

            return $this;
        }

        if (0 === count($authors)) {
            throw new \InvalidArgumentException();
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
        if (null === $publisher) {
            return $this;
        }

        if ('' === $publisher) {
            throw new \InvalidArgumentException();
        }

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
        if (null === $publishedAt) {
            return $this;
        }

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
     * {@inheritdoc}
     */
    public function getPriceCode(): ?string
    {
        return $this->priceCode;
    }

    /**
     * Set the price.
     *
     * @see https://www.iso.org/iso-4217-currency-codes.html
     *
     * @param int|null $price The price
     * @param string|null $code The price code
     *
     * @return $this
     */
    public function setPrice(?int $price, ?string $code): Book
    {
        if (null === $price) {
            $this->price = null;
            $this->priceCode = null;

            return $this;
        }

        if (null === $code || '' === $code) {
            throw new \InvalidArgumentException();
        }

        $this->price = $price;
        $this->priceCode = $code;

        return $this;
    }
}
