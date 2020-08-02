<?php

namespace BookBok\BookInfoScraper\Information;

/**
 * Immutable book information.
 *
 * @package BookBok\BookInfoScraper
 * @license MIT
 */
class ImmutableBook extends AbstractBook
{
    /**
     * Returns an instance with the specific id.
     *
     * @param string $id
     *
     * @return ImmutableBook
     */
    public function withId(string $id): ImmutableBook
    {
        if ($id === "") {
            throw new \InvalidArgumentException("Cannot set empty string.");
        }

        $cloneBook = clone $this;
        $cloneBook->id = $id;

        return $cloneBook;
    }

    /**
     * Returns an instance with the specific title.
     *
     * @param string $title The title.
     *
     * @return ImmutableBook
     */
    public function withTitle(string $title): ImmutableBook
    {
        if ($title === "") {
            throw new \InvalidArgumentException("Cannot set empty string.");
        }

        if (mb_strpos($title, "\n") !== false || mb_strpos($title, "\r") !== false) {
            throw new \InvalidArgumentException("Cannot contain line breaks.");
        }

        $cloneBook = clone $this;
        $cloneBook->title = $title;

        return $cloneBook;
    }

    /**
     * Returns an instance with the specific sub title.
     *
     * @param string|null $subTitle The sub title.
     *
     * @return ImmutableBook
     */
    public function withSubTitle(?string $subTitle): ImmutableBook
    {
        if ($subTitle !== null) {
            if ($subTitle === "") {
                throw new \InvalidArgumentException("Cannot set empty string.");
            }

            if (mb_strpos($subTitle, "\n") !== false || mb_strpos($subTitle, "\r") !== false) {
                throw new \InvalidArgumentException("Cannot contain line breaks.");
            }
        }

        $cloneBook = clone $this;
        $cloneBook->subTitle = $subTitle;

        return $cloneBook;
    }

    /**
     * Returns an instance with the specific description.
     *
     * @param string|null $description The description.
     *
     * @return ImmutableBook
     */
    public function withDescription(?string $description): ImmutableBook
    {
        $convertedDescription = $description;

        if ($description !== null) {
            if ($description === "") {
                throw new \InvalidArgumentException("Cannot set empty string.");
            }

            $convertedDescription = preg_replace("/\r\n|\r|\n/", "\n", $description);
        }

        $cloneBook = clone $this;
        $cloneBook->description = $convertedDescription;

        return $cloneBook;
    }

    /**
     * Returns an instance with the specific cover uri.
     *
     * @param string|null $coverUri The cover uri.
     *
     * @return ImmutableBook
     */
    public function withCoverUri(?string $coverUri): ImmutableBook
    {
        if ($coverUri !== null) {
            if ($coverUri === "") {
                throw new \InvalidArgumentException("Cannot set empty string.");
            }

            if (preg_match("/\Ahttps?:\/\//u", $coverUri) !== 1) {
                throw new \InvalidArgumentException(
                    "It is not possible to set string that does not start with https?://"
                );
            }
        }

        $cloneBook = clone $this;
        $cloneBook->coverUri = $coverUri;

        return $cloneBook;
    }

    /**
     * Returns an instance with the specific page count.
     *
     * @param int|null $pageCount The page count.
     *
     * @return ImmutableBook
     */
    public function withPageCount(?int $pageCount): ImmutableBook
    {
        if ($pageCount !== null) {
            if ($pageCount < 1) {
                throw new \InvalidArgumentException("Cannot set a number smaller than 1.");
            }
        }

        $cloneBook = clone $this;
        $cloneBook->pageCount = $pageCount;

        return $cloneBook;
    }

    /**
     * {@inheritDoc}
     *
     * @return ImmutableAuthor[]|null
     */
    public function getAuthors(): ?array
    {
        /** @var ImmutableAuthor[]|null */
        return parent::getAuthors();
    }

    /**
     * Returns an instance with the specific authors.
     *
     * @param ImmutableAuthor[]|null $authors The authors.
     *
     * @return ImmutableBook
     */
    public function withAuthors(?array $authors): ImmutableBook
    {
        if ($authors !== null) {
            if (count($authors) === 0) {
                throw new \InvalidArgumentException("Cannot set empty array.");
            }

            if ($authors !== array_values($authors)) {
                throw new \InvalidArgumentException("Cannot set associative array.");
            }

            foreach ($authors as $author) {
                // @phpstan-ignore-next-line phpdoc has already constrained that $author is an ImmutableAuthor.
                if (!(is_object($author) && $author instanceof ImmutableAuthor)) {
                    throw new \InvalidArgumentException(
                        "Cannot set the value other than the object that inherits ImmutableAuthor."
                    );
                }
            }
        }

        $cloneBook = clone $this;
        $cloneBook->authors = $authors;

        return $cloneBook;
    }

    /**
     * Returns an instance with the specific publisher.
     *
     * @param string|null $publisher The publisher.
     *
     * @return ImmutableBook
     */
    public function withPublisher(?string $publisher): ImmutableBook
    {
        if ($publisher !== null) {
            if ($publisher === "") {
                throw new \InvalidArgumentException("Cannot set empty string.");
            }

            if (mb_strpos($publisher, "\n") !== false || mb_strpos($publisher, "\r") !== false) {
                throw new \InvalidArgumentException("Cannot contain line breaks.");
            }
        }

        $cloneBook = clone $this;
        $cloneBook->publisher = $publisher;

        return $cloneBook;
    }

    /**
     * Returns an instance with the specific published country code.
     *
     * @param string|null $publishedCountryCode The published country code.
     *
     * @return ImmutableBook
     */
    public function withPublishedCountryCode(?string $publishedCountryCode): ImmutableBook
    {
        if ($publishedCountryCode !== null) {
            if (preg_match("/\A[A-Z]{2}\z/", $publishedCountryCode) !== 1) {
                throw new \InvalidArgumentException(
                    "Cannot set string that does not match the ISO 3166-1 Country Codes alpha-2 code format."
                );
            }
        }

        $cloneBook = clone $this;
        $cloneBook->publishedCountryCode = $publishedCountryCode;

        return $cloneBook;
    }

    /**
     * Returns an instance with the specific published date.
     *
     * @param string|null $publishedDate The published date.
     *
     * @return ImmutableBook
     */
    public function withPublishedData(?string $publishedDate): ImmutableBook
    {
        if ($publishedDate !== null) {
            if (
                preg_match("/\A([1-9][0-9]*)-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])\z/", $publishedDate, $m) !== 1
            ) {
                throw new \InvalidArgumentException("Cannot set string that is not YYYY-MM-DD format.");
            }

            if (!checkdate((int)$m[2], (int)$m[3], (int)$m[1])) {
                throw new \InvalidArgumentException("Cannot set invalid date.");
            }
        }

        $cloneBook = clone $this;
        $cloneBook->publishedDate = $publishedDate;

        return $cloneBook;
    }

    /**
     * Returns an instance with the specific price.
     *
     * @param float|null  $price The price.
     * @param string|null $priceCode The currency code.
     *
     * @return ImmutableBook
     */
    public function withPrice(?float $price, ?string $priceCode): ImmutableBook
    {
        if ($price !== null || $priceCode !== null) {
            if ($price !== null && $price < 0) {
                throw new \InvalidArgumentException("Cannot set a number smaller than 0.");
            }

            if ($priceCode !== null && preg_match("/\A[A-Z]{3}\z/", $priceCode) !== 1) {
                throw new \InvalidArgumentException(
                    "Cannot set string that does not match the ISO 4217 Currency Codes format."
                );
            }

            if ($price !== null && $priceCode === null) {
                throw new \InvalidArgumentException("Cannot set price without currency code.");
            }
        }

        $cloneBook = clone $this;
        $cloneBook->price = $price;
        $cloneBook->priceCode = $priceCode;

        return $cloneBook;
    }
}
