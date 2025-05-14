<?php

    $uploadDir = "uploads/";
    if(!is_dir($uploadDir)){
        mkdir($uploadDir, 0755, true);
    }

    $allowedSize = 2 * 1024 * 1024;
    $allowedType = ["image/png", "image/jpg", "image/webp", "application/pdf"];

    if($_FILES["file"]["size"] > $allowedSize){
        echo "File size exceeded the limit.";
    }

    if(in_array($_FILES["file"]["type"], $allowedType)){
        echo "File format not allowed.";
    }

    $safeFilename = uniqid().'_'.basename($_FILES["file"]["name"]);
    $uploadFile = $uploadDir.$safeFilename;

    if(!empty($errors)){
        foreach($errors as $error){
            echo"<p>".$error."</p>";
        }
        exit;
    }
    
    else{
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $uploadFile)){
            echo "File Uploaded Successfully: ".htmlspecialchars($safeFilename);
        }
        else{
            echo "Upload error.".$_FILES["files"]["error"];
        }
    }

?>