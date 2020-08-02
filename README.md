# Book Information scraper

This library provides a unified interface
to retrieve book information from each source.

## Install

```bash
$ composer require bookbok/book-info-scraper
```

## License

The MIT license applies to this library.
The full license is described in the LICENSE file.

## Uses

Implement `ScraperInterface`, `BookInterface`, and `AuthorInterface` for each information source,
and get the information of a book from the implemented Scraper.