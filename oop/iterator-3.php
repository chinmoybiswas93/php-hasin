<?php

class Book
{
    public string $title;
    public string $author;

    public function __construct(string $title, string $author)
    {
        $this->title = $title;
        $this->author = $author;
    }
}

class BookCollection implements Iterator
{
    private array $books = [];
    private int $position = 0;

    public function addBook(Book $book): void
    {
        $this->books[] = $book;
    }

    public function current(): Book
    {
        return $this->books[$this->position];
    }

    public function key(): int
    {
        return $this->position;
    }

    public function next(): void
    {
        $this->position++;
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function valid(): bool
    {
        return isset($this->books[$this->position]);
    }
}

// Create a book collection
$collection = new BookCollection();
$collection->addBook(new Book("The Catcher in the Rye", "J.D. Salinger"));
$collection->addBook(new Book("1984", "George Orwell"));
$collection->addBook(new Book("To Kill a Mockingbird", "Harper Lee"));

// Iterate over the book collection
// foreach ($collection as $key => $book) {
//     echo "Book #$key: {$book->title} by {$book->author}\n";
// }


class BookCollectionFiltered extends BookCollection {
    private ?string $filterAuthor = null;

    public function filterByAuthor(string $author): void {
        $this->filterAuthor = $author;
    }

    public function valid(): bool {
        while (parent::valid()) {
            $currentBook = $this->current();
            if ($this->filterAuthor === null || $currentBook->author === $this->filterAuthor) {
                return true;
            }
            $this->next(); // Skip non-matching books
        }
        return false;
    }
}

$filteredCollection = new BookCollectionFiltered();
$filteredCollection->addBook(new Book("1984", "George Orwell"));
$filteredCollection->addBook(new Book("Animal Farm", "George Orwell"));
$filteredCollection->addBook(new Book("To Kill a Mockingbird", "Harper Lee"));

$filteredCollection->filterByAuthor("George Orwell");

foreach ($filteredCollection as $key => $book) {
    echo "Book #$key: {$book->title} by {$book->author}\n";
}
