# kento-oka/book-info-scraper

## Uses

```php
use Kentoka\BookScraper\ScrapeManager;
use Kentoka\BookScraper\ScraperInterface;
use Kentoka\BookScraper\BookInterface;
use Kentoka\BookScraper\Book;

class ISBNScraper implements ScraperInterface{

    /**
     * {@inheritdoc}
     */
    public function support(string $id): bool{
        return 1 === preg_match("ISBN REGEX", $id);
    }

    /**
     * {@inheritdoc}
     */
    public function scrape(string $id): BookInterface{
        $content    = file_get_contents("https://example.com/book?isbn={$id}");
        $data       = json_decode($content);

        $book       = new Book($id, $data["title"]);

        $book->setDescription($data["description"]);

        return $book;
    }
}

$manager    = new ScrapeManager();
$manager->add(new ISBNScraper());

$book   = $manager->scrape("9784000000000");
```