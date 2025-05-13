<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paginated Business Listings</title>
</head>
<body>
    <h1>Paginated Business Listings</h1>
    <?php
    $businessDetails = [
        ["name" => "Business A", "category" => "Retail", "location" => "City A", "contact" => "123-456-7890"],
        ["name" => "Business B", "category" => "Food", "location" => "City B", "contact" => "987-654-3210"],
        ["name" => "Business C", "category" => "Retail", "location" => "City A", "contact" => "555-555-5555"],
        ["name" => "Business D", "category" => "Service", "location" => "City C", "contact" => "444-444-4444"]
    ];

    $pageSize = 2;
    $chunks = array_chunk($businessDetails, $pageSize);

    foreach ($chunks as $index => $chunk) {
        echo "<h2>Page " . ($index + 1) . "</h2>";
        foreach ($chunk as $business) {
            echo "<p>{$business['name']} - {$business['location']} - {$business['contact']}</p>";
        }
    }
    ?>
</body>
</html>