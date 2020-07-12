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
        if (null !== $coverUri && '' === $coverUri) {
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
        if (null !== $pageCount && 0 > $pageCount) {
            throw new \InvalidArgumentException();
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
        if (null !== $authors) {
            foreach ($authors as $author) {
                if (!is_object($authors) || $author instanceof AuthorInterface) {
                    throw new \InvalidArgumentException();
                }
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
        if (null !== $publisher && '' === $publisher) {
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
        if (
            (null === $price && null !== $code)
            || (null !== $price && null === $code)
        ) {
            throw new \InvalidArgumentException();
        }

        if (null !== $price && 0 > $price) {
            throw new \InvalidArgumentException();
        }

        if (null !== $code && '' === $code) {
            throw new \InvalidArgumentException();
        }

        $this->price = $price;
        $this->priceCode = $code;

        return $this;
    }
}
