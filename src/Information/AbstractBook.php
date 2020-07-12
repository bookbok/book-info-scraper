<?php

namespace BookBok\BookInfoScraper\Information;

use BookBok\BookInfoScraper\Exception\InformationInstanceException;

/**
 * Book information.
 *
 * @package BookBok\BookInfoScraper
 * @license MIT
 */
abstract class AbstractBook implements BookInterface
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string|null
     */
    protected $subTitle;

    /**
     * @var string|null
     */
    protected $description;

    /**
     * @var string|null
     */
    protected $coverUri;

    /**
     * @var int|null
     */
    protected $pageCount;

    /**
     * @var AuthorInterface[]|null
     */
    protected $authors;

    /**
     * @var string|null
     */
    protected $publisher;

    /**
     * @var string|null
     */
    protected $publishedCountryCode;

    /**
     * @var string|null
     */
    protected $publishedDate;

    /**
     * @var float|null
     */
    protected $price;

    /**
     * @var string|null
     */
    protected $priceCode;

    /**
     * {@inheritdoc}
     */
    public function getId(): string
    {
        if ($this->id === null) {
            throw new InformationInstanceException("Id is not set.");
        }

        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle(): string
    {
        if ($this->title === null) {
            throw new InformationInstanceException("Title is not set.");
        }

        return $this->title;
    }

    /**
     * {@inheritdoc}
     */
    public function getSubTitle(): ?string
    {
        return $this->subTitle;
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * {@inheritdoc}
     */
    public function getCoverUri(): ?string
    {
        return $this->coverUri;
    }

    /**
     * {@inheritdoc}
     */
    public function getPageCount(): ?int
    {
        return $this->pageCount;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthors(): ?array
    {
        return $this->authors;
    }

    /**
     * {@inheritdoc}
     */
    public function getPublisher(): ?string
    {
        return $this->publisher;
    }

    /**
     * {@inheritdoc}
     */
    public function getPublishedCountryCode(): ?string
    {
        return $this->publishedCountryCode;
    }

    /**
     * {@inheritdoc}
     */
    public function getPublishedDate(): ?string
    {
        return $this->publishedDate;
    }

    /**
     * {@inheritdoc}
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * {@inheritdoc}
     */
    public function getPriceCode(): ?string
    {
        if ($this->price !== null && $this->priceCode === null) {
            throw new InformationInstanceException("Price is set but price code is not set.");
        }

        return $this->priceCode;
    }
}
