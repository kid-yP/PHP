<!DOCTYPE html>

<html lang='en'>
<head>
    <meta charset="UTF-8">
    <title><?php echo "Kaleb" ?></title>
    <body>
        <?php

            $cars = [[
                "brand" => "Tesla",
                "model" => "ModelX",
                "year" => "2025",
            ],
            [
                "brand" => "Tesla",
                "model" => "ModelX",
                "year" => "2025",
            ]];
            //foreach($cars as $key => $value){
            //    echo $key." = ".$value."<br>";
            //}
            
            var_dump($cars);
        ?> 
    </body>