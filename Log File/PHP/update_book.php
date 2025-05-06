<?php
include 'includes/db.php';
include 'includes/functions.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM books WHERE id = ?");
    $stmt->execute([$id]);
    $book = $stmt->fetch();

    if (!$book) {
        echo "Book not found.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];

    $stmt = $conn->prepare("UPDATE books SET title = ? WHERE id = ?");
    $stmt->execute([$title, $id]);

    logAction('Updated', $title);

    echo "Book updated successfully!";
    header("Location: list_books.php");
    exit;
}
?>

<form method="post">
    <input type="hidden" name="id" value="<?= htmlspecialchars($book['id']) ?>">
    <input type="text" name="title" value="<?= htmlspecialchars($book['title']) ?>" required>
    <button type="submit">Update Book</button>
</form>
