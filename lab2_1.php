<!DOCTYPE html>

<html lang='en'>
<head>
    <meta charset="UTF-8">
    <title> Document </title>
    <body>
        <h3>Registarion form</h3>
        <form action="register.php" method="post">
            <label for="">Full Name</label><br>
            <input type="text" name="fullname" id="fullname"><br>
            <label for="">Email</label><br>
            <input type="text" name="email" id="email"><br><br>
            <input type="submit" name="Register" value="register">
        </form>

    </body>
</html>
<?php

    if(isset($_POST["register"])) {
        echo "Form Submitted";
    }
    
?>