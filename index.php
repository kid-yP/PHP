<!DOCTYPE html>

<html lang='en'>
<head>
    <meta charset="UTF-8">
    <title><?php echo "Kidus" ?></title>
</head>
<body>
    <h1>
        This is <?php echo "<span style='color: red;'> my code </span>"; ?>
    </h1>

    <?php
        $name = "Kidus";
        $age = 20;
        $gender = "Male";
    ?>

    <table border="1">
        <thead>
            <th style='color: red; background-color: blue;' >Name</th>
            <th style='color: red; background-color: blue;'>Age</th>
            <th style='color: red; background-color: blue;'>Gender</th>
        </thead>
        <tbody>
            <tr>
                <td style='color: blue; background-color: green;'><?php echo $name; ?></td>
                <td style='color: blue; background-color: green;'><?php echo $age; ?></td>
                <td style='color: blue; background-color: green;'><?php echo $gender; ?></td>
            </tr>
        </tbody>
    </table>
    
    <?php
        function addNumbers($a, $b){
            echo$a + $b;
        }
    addNumbers(5, 5);
    echo "<br />";

    function getStudent($id = 0){
        if($id > 0){
            echo "data for student ".$id;
        }else{
            echo "all data";
        }
        }

        getStudent(10);
        echo "<br />";

        $globalVariable = "I am a global variable";
        function showGlobal(){
            global $globalVariable;
            echo $globalVariable;
        }

        showGlobal();
        echo "<br />";

        $cars = ["Tesla", "Ferrari", "Bugatti", "BMW"];

        //$cars2 = array("Tesla", "Ferrari", "Bugatti", "BMW");
        echo "<br />";
        
        for($i=0; $i<count($cars); $i++){
            echo $cars[$i]."<br>";
        }
        echo "<br>";
        foreach($cars as $car){
            echo $car."<br>";
        }
    ?>

</body>
</html>