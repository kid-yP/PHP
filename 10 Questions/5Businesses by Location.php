<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Businesses by Location</title>
</head>
<body>
    <h1>Businesses Grouped by Location</h1>
    <?php
    $businessDetails = [
        ["name" => "Business A", "category" => "Retail", "location" => "City A", "contact" => "123-456-7890"],
        ["name" => "Business B", "category" => "Food", "location" => "City B", "contact" => "987-654-3210"],
        ["name" => "Business C", "category" => "Retail", "location" => "City A", "contact" => "555-555-5555"]
    ];

    $groupedByLocation = [];
    foreach ($businessDetails as $business) {
        $groupedByLocation[$business['location']][] = $business;
    }

    foreach ($groupedByLocation as $location => $businesses) {
        echo "<h2>$location</h2>";
        foreach ($businesses as $business) {
            echo "<p>{$business['name']}</p>";
        }
    }
    ?>
</body>
</html>