<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorted Business Listings</title>
</head>
<body>
    <h1>Sorted Business Listings</h1>
    <?php
    $businessDetails = [
        ["name" => "Business B", "category" => "Food", "location" => "City B", "contact" => "987-654-3210"],
        ["name" => "Business A", "category" => "Retail", "location" => "City A", "contact" => "123-456-7890"],
        ["name" => "Business C", "category" => "Retail", "location" => "City A", "contact" => "555-555-5555"]
    ];

    usort($businessDetails, function($a, $b) {
        return strcmp($a['name'], $b['name']);
    });

    echo '<table border="1">';
    echo '<tr><th>Name</th><th>Category</th><th>Location</th><th>Contact</th></tr>';
    foreach ($businessDetails as $business) {
        if (isset($business['name'])) {
            echo "<tr>
                    <td>{$business['name']}</td>
                    <td>{$business['category']}</td>
                    <td>{$business['location']}</td>
                    <td>{$business['contact']}</td>
                  </tr>";
        } else {
            echo "<tr><td colspan='4'>Business details not available</td></tr>";
        }
    }
    echo '</table>';
    ?>
</body>
</html>