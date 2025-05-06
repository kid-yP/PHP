<?php
require_once "Book.php";

class EBook extends Book {
    private $fileSize;

    public function __construct($title, $author, $publicationYear, $fileSize) {
        parent::__construct($title, $author, $publicationYear);
        $this->fileSize = $fileSize;
    }

    public function setFileSize($fileSize) {
        $this->fileSize = $fileSize;
    }

    public function getFileSize() {
        return $this->fileSize;
    }

    public function getFileSizeInfo() {
        return "File size: {$this->fileSize} MB.";
    }

    public function getBookInfo() {
        return parent::getBookInfo() . " File size: {$this->fileSize} MB.";
    }
}
?>
