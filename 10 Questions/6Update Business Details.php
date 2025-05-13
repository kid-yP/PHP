<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Business Details</title>
</head>
<body>
    <h1>Update Business Details</h1>
    <?php
    $businessDetails = [
        ["name" => "Business A", "category" => "Retail", "location" => "City A", "contact" => "123-456-7890"],
        ["name" => "Business B", "category" => "Food", "location" => "City B", "contact" => "987-654-3210"]
    ];

    function updateBusiness(&$businesses, $name, $newDetails) {
        foreach ($businesses as &$business) {
            if ($business['name'] === $name) {
                $business = array_merge($business, $newDetails);
                return;
            }
        }
    }

    updateBusiness($businessDetails, "Business A", ["location" => "New City A", "contact" => "111-222-3333"]);
    print_r($businessDetails);
    ?>
</body>
</html>
