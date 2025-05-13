<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Businesses</title>
</head>
<body>
    <h1>Search Businesses by Category</h1>
    <form method="POST">
        <input type="text" name="category" placeholder="Enter category">
        <input type="submit" value="Search">
    </form>

    <?php
    $businessDetails = [
        ["name" => "Business A", "category" => "Retail", "location" => "City A", "contact" => "123-456-7890"],
        ["name" => "Business B", "category" => "Food", "location" => "City B", "contact" => "987-654-3210"],
        ["name" => "Business C", "category" => "Retail", "location" => "City A", "contact" => "555-555-5555"]
    ];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $category = $_POST['category'];
        $filteredBusinesses = array_filter($businessDetails, function($business) use ($category) {
            return $business['category'] === $category;
        });

        echo "<h2>Results for '$category':</h2>";
        foreach ($filteredBusinesses as $business) {
            echo "<p>{$business['name']} - {$business['location']} - {$business['contact']}</p>";
        }
    }
    ?>
</body>
</html>