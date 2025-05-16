<?php
    // db.php
    $host = '127.0.0.1';       // or 'localhost'
    $port = 3307;              // ← your MySQL port here
    $db   = 'bookstore2';
    $user = 'root';        // or 'root'
    $pass = '';  // or your root password

    $dsn = "mysql:host={$host};port={$port};dbname={$db};charset=utf8mb4";
    try {
        $pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    } catch (PDOException $e) {
        echo json_encode([
            "error" => "Connection failed: " . $e->getMessage()
        ]);
        exit;
    }
?>
