<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Details</title>
</head>
<body>
    <h1>Business Details</h1>
    <?php
    $businessDetails = [
        [
            "name" => "Business A",
            "category" => "Retail",
            "location" => "City A",
            "contact" => "123-456-7890"
        ],
        [
            "name" => "Business B",
            "category" => "Food",
            "location" => "City B",
            "contact" => "987-654-3210"
        ]
    ];

    foreach ($businessDetails as $business) {
        echo "<h3>{$business['name']}</h3>";
        echo "<p>Category: {$business['category']}</p>";
        echo "<p>Location: {$business['location']}</p>";
        echo "<p>Contact: {$business['contact']}</p>";
    }
    ?>
</body>
</html>