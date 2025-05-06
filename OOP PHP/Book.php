<?php
class Book {
    private $title;
    private $author;
    private $publicationYear;

    public function __construct($title, $author, $publicationYear) {
        $this->title = $title;
        $this->author = $author;
        $this->publicationYear = $publicationYear;
    }

    public function getBookInfo() {
        return "{$this->title} by {$this->author}, published in {$this->publicationYear}.";
    }
}
?>
