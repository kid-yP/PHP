<?php
include 'includes/db.php';
include 'includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];

    $coverPhoto = processCoverPhoto($_FILES['cover_photo']);

    $stmt = $conn->prepare("INSERT INTO books (title, cover_photo) VALUES (?, ?)");
    $stmt->execute([$title, $coverPhoto]);

    logAction('Created', $title);

    echo "Book created successfully!";
}
?>

<form method="post" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Book Title" required>
    <input type="file" name="cover_photo" accept="image/jpeg" required>
    <button type="submit">Create Book</button>
</form>
