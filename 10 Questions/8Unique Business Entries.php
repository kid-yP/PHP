<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unique Business Entries</title>
</head>
<body>
    <h1>Unique Business Entries</h1>
    <?php
    $businessDetails = [
        ["name" => "Business A", "category" => "Retail", "location" => "City A", "contact" => "123-456-7890"],
        ["name" => "Business B", "category" => "Food", "location" => "City B", "contact" => "987-654-3210"],
        ["name" => "Business A", "category" => "Retail", "location" => "City A", "contact" => "123-456-7890"]
    ];

    $uniqueBusinesses = array_unique(array_column($businessDetails, 'name'));
    echo '<ul>';
    foreach ($uniqueBusinesses as $uniqueBusiness) {
        echo "<li>$uniqueBusiness</li>";
    }
    echo '</ul>';
    ?>
</body>
</html>