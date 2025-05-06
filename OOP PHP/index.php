<?php
require_once "Book.php";
require_once "EBook.php";

$book = new Book("1984", "George Orwell", 1949);
echo $book->getBookInfo() . "<br>";

$eBook = new EBook("1984", "George Orwell", 1949, 1.2);
echo $eBook->getBookInfo();
?>
