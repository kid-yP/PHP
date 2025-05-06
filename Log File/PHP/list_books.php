<?php
include 'includes/db.php';

$stmt = $conn->query("SELECT * FROM books");
$books = $stmt->fetchAll();
?>

<h1>Books</h1>
<a href="create_book.php">Add New Book</a>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Cover</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($books as $book): ?>
    <tr>
        <td><?= htmlspecialchars($book['id']) ?></td>
        <td><?= htmlspecialchars($book['title']) ?></td>
        <td>
            <?php if ($book['cover_photo']): ?>
                <img src="<?= htmlspecialchars($book['cover_photo']) ?>" width="100">
            <?php endif; ?>
        </td>
        <td>
            <a href="update_book.php?id=<?= $book['id'] ?>">Edit</a> |
            <a href="delete_book.php?id=<?= $book['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
