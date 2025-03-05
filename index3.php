<!DOCTYPE html>

<html lang='en'>
<head>
    <meta charset="UTF-8">
    <title><?php echo "Kaleb" ?></title>
    <body>
    <?php
        $directory = [
            ["name" => "Cafe Aroma", "category" => "Restaurant", "location" => "Downtown"],
            ["name" => "Tech Solutions", "category" => "IT Services", "location" => "Uptown"],
            ["name" => "Green Market", "category" => "Grocery", "location" => "Suburb"],
        ];
    ?>

    <table border="1">
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Location</th>
        </tr>
        <?php foreach($directory as $business): ?>
        <tr>
            <td><?php echo $business["name"]; ?></td>
            <td><?php echo $business["category"]; ?></td>
            <td><?php echo $business["location"]; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    </body>
</html>