<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    function processCoverPhoto($fileTmpPath, $fileName) {
        $uploadDir = "uploads/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
    
        $destination = $uploadDir . uniqid() . "_" . basename($fileName);
        $image = imagecreatefromstring(file_get_contents($fileTmpPath));
        if (!$image) return null;
    
        $resized = imagescale($image, 300, 300);
        $text = "Do not copy";
        $textColor = imagecolorallocate($resized, 255, 0, 0);
        $font = __DIR__ . '/arial.ttf';
    
        // Fallback if font doesn't exist
        if (!file_exists($font)) {
            imagestring($resized, 5, 10, 280, $text, $textColor);
        } else {
            imagettftext($resized, 16, 0, 10, 280, $textColor, $font, $text);
        }
    
        imagejpeg($resized, $destination);
        return $destination;
    }
    
?>