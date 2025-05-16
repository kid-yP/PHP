<?php
    // api.php — your REST logic
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    header("Content-Type: application/json");
    include 'db.php';
    include 'image.php';

    // Allow HTML forms to “override” to PUT
    $method = $_SERVER["REQUEST_METHOD"];
    if ($method === 'POST' && !empty($_POST['_method']) && $_POST['_method'] === 'PUT') {
        $method = 'PUT';
    }

    function logAction($action, $bookData = []) {
        $logFile = 'book_log.txt';
        $date = date('Y-m-d H:i:s');
        $entry = "[$date] Action: $action";
        if (!empty($bookData)) {
            $entry .= " | Data: " . json_encode($bookData);
        }
        $entry .= PHP_EOL;
        file_put_contents($logFile, $entry, FILE_APPEND);
    }

    switch ($method) {
        case 'GET':
            try {
                if (isset($_GET['id'])) {
                    $stmt = $pdo->prepare("SELECT * FROM books WHERE id = ?");
                    $stmt->execute([ $_GET['id'] ]);
                    $book = $stmt->fetch(PDO::FETCH_ASSOC);
                    echo json_encode($book ?: ["message" => "Book not found"]);
                } else {
                    $stmt = $pdo->query("SELECT * FROM books");
                    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    echo json_encode($books);
                }
            } catch (PDOException $e) {
                http_response_code(500);
                echo json_encode(["error" => $e->getMessage()]);
            }
            break;

        case 'POST':  // create OR update via _method=PUT
            $coverPath = null;
            if (!empty($_FILES['cover_photo']['tmp_name'])) {
                $coverPath = processCoverPhoto(
                    $_FILES['cover_photo']['tmp_name'],
                    $_FILES['cover_photo']['name']
                );
            }
            try {
                if (!empty($_POST['id'])) {
                    // UPDATE
                    $stmt = $pdo->prepare("
                        UPDATE books
                        SET title = ?, author = ?, genre = ?, published_year = ?, cover_photo = ?
                        WHERE id = ?
                    ");
                    $stmt->execute([
                        $_POST['title'],
                        $_POST['author'],
                        $_POST['genre'],
                        $_POST['published_year'],
                        $coverPath,
                        $_POST['id']
                    ]);
                    logAction("Updated", $_POST);
                    echo json_encode(["message" => "Book updated successfully"]);
                } else {
                    // INSERT
                    $stmt = $pdo->prepare("
                        INSERT INTO books
                          (title, author, genre, published_year, cover_photo)
                        VALUES
                          (?, ?, ?, ?, ?)
                    ");
                    $stmt->execute([
                        $_POST['title'],
                        $_POST['author'],
                        $_POST['genre'],
                        $_POST['published_year'],
                        $coverPath
                    ]);
                    logAction("Created", $_POST);
                    echo json_encode(["message" => "Book added successfully"]);
                }
            } catch (PDOException $e) {
                http_response_code(500);
                echo json_encode(["error" => $e->getMessage()]);
            }
            break;

        case 'PUT':
            // (If you ever do true PUT via php://input, handle here.)
            echo json_encode(["error" => "Use POST with _method=PUT"]);
            break;

        case 'DELETE':
            try {
                if (isset($_GET['id'])) {
                    $stmt = $pdo->prepare("DELETE FROM books WHERE id = ?");
                    $stmt->execute([ $_GET['id'] ]);
                    logAction("Deleted", ["id" => $_GET['id']]);
                    echo json_encode(["message" => "Book deleted successfully"]);
                } else {
                    http_response_code(400);
                    echo json_encode(["error" => "Book ID required"]);
                }
            } catch (PDOException $e) {
                http_response_code(500);
                echo json_encode(["error" => $e->getMessage()]);
            }
            break;

        default:
            http_response_code(405);
            echo json_encode(["error" => "Invalid request method"]);
            break;
    }
?>
