<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="src/style.css" type="text/css">
</head>
<body>

<header>
    <section>
        <ul>
            <li class="left"><img src="images/logo.png" id="logo" width="200" height="100"></li>
            <li class="right"><button onclick="location.href='main_page.php'">Home Page</button></li>

        </ul>

    </section>

</header>

<div class="register_box">

    <form action ="register_page.php" class="RegisterForm" method="post">

        <label>Company Name: </label>
        <input type="text" name="coname"/>

        <label>City: </label>
        <input type="text" name="City"/>

        <label>Username: </label>
        <input type="text" name="Username"/>

        <label>Password: </label>
        <input type="password" name="Password"/>

        <input type="submit" name="Register" class="button" value="Register"/>

        <div class="goToLogin">
            <input  class="button" type="button" value="Already have an account? Log In here" name="go to log in" onclick="location.href='login_page.php'">
        </div>

    </form>

</div>


<?php

if(isset($_POST["Register"])) {
    $coname = $_POST["coname"];
    $cityname = $_POST["City"];
    $username = $_POST["Username"];
    $password = $_POST["Password"];

    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "logindb";

    $connection = mysqli_connect($servername, $dbUsername, $dbPassword, $dbname);


    require_once 'inc/func.php';

    if (empty1($coname, $cityname, $username, $password) !== false) {
        exit();
    }


    userCreate($connection, $coname, $cityname, $username, $password);


}
?>

</body>
</html>
