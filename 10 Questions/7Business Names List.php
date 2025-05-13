<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Names List</title>
</head>
<body>
    <h1>List of Business Names</h1>
    <?php
    $businessDetails = [
        ["name" => "Business A", "category" => "Retail", "location" => "City A", "contact" => "123-456-7890"],
        ["name" => "Business B", "category" => "Food", "location" => "City B", "contact" => "987-654-3210"]
    ];

    $businessNames = array_column($businessDetails, 'name');
    echo '<ul>';
    foreach ($businessNames as $name) {
        echo "<li>$name</li>";
    }
    echo '</ul>';
    ?>
</body>
</html>