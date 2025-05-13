<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Dropdown</title>
</head>
<body>
    <h1>Select a Business</h1>
    <form>
        <select name="business">
            <?php
            $businessNames = ["Business A", "Business B", "Business C", "Business D"];
            foreach ($businessNames as $business) {
                echo "<option value=\"$business\">$business</option>";
            }
            ?>
        </select>
        <input type="submit" value="Submit">
    </form>
</body>
</html>