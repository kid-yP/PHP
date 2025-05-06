<?php
include 'includes/db.php';
include 'includes/functions.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM books WHERE id = ?");
    $stmt->execute([$id]);
    $book = $stmt->fetch();

    if ($book) {
        $stmt = $conn->prepare("DELETE FROM books WHERE id = ?");
        $stmt->execute([$id]);

        logAction('Deleted', $book['title']);
    }
}

header("Location: list_books.php");
exit;
?>