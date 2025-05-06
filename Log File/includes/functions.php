<?php
function logAction($action, $bookTitle) {
    $logFile = __DIR__ . '/../logs/book_log.txt';
    $dateTime = date('Y-m-d H:i:s');
    $entry = "[$dateTime] Action: $action - Book: $bookTitle" . PHP_EOL;
    file_put_contents($logFile, $entry, FILE_APPEND);
}

function processCoverPhoto($file) {
    $uploadDir = __DIR__ . '/../uploads/';
    $fileName = time() . '_' . basename($file['name']);
    $targetFile = $uploadDir . $fileName;

    move_uploaded_file($file['tmp_name'], $targetFile);

    $src = imagecreatefromjpeg($targetFile);
    $dst = imagecreatetruecolor(500, 500);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, 500, 500, imagesx($src), imagesy($src));

    $text = "Do not copy";
    $fontSize = 20;
    $fontColor = imagecolorallocate($dst, 255, 0, 0);
    $fontFile = __DIR__.'/../arial.ttf';
    if (file_exists($fontFile)) {
        imagettftext($dst, $fontSize, 0, 20, 30, $fontColor, $fontFile, $text);
    }

    imagejpeg($dst, $targetFile);
    imagedestroy($src);
    imagedestroy($dst);

    return 'uploads/' . $fileName;
}
?>