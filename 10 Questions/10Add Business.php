<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Business</title>
</head>
<body>
    <h1>Add a New Business</h1>
    <form method="POST">
        <input type="text" name="business_name" placeholder="Enter business name" required>
        <input type="submit" value="Add Business">
    </form>

    <?php
    $businessDetails = [
        ["name" => "Business A", "category" => "Retail", "location" => "City A", "contact" => "123-456-7890"],
        ["name" => "Business B", "category" => "Food", "location" => "City B", "contact" => "987-654-3210"]
    ];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $newBusinessName = $_POST['business_name'];
        $existingBusinessNames = array_column($businessDetails, 'name');

        if (in_array($newBusinessName, $existingBusinessNames)) {
            echo "<p style='color:red;'>The business '$newBusinessName' is already listed.</p>";
        } else {
            echo "<p style='color:green;'>The business '$newBusinessName' has been added successfully!</p>";
        }
    }
    ?>
</body>
</html>