<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sign in</title>
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

<div class="login_box">

    <form action ="login_page.php" class="LoginForm" method="post" enctype='multipart/form-data'>
        <div class="form-group">
            <label>Username: </label>
            <input type="text" name="Username"/>
        </div>
        <div class="form-group">
            <label>Password: </label>
            <input type="password" name="Password"/>
        </div>

        <input type="submit" name="Login" class="button" value="Sign In" />
        <div class="goToRegisterPage">
            <input  class="button" type="button" value="Don't have an account? Register Here." name="Go To Register Page" onclick="location.href='register_page.php'"/>
        </div>

    </form>

    <?php
    if(isset($_POST["Login"])) {
        $username = $_POST["Username"];
        $password = $_POST["Password"];


        $servername = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbname = "logindb";

        $connection = mysqli_connect($servername, $dbUsername, $dbPassword, $dbname);

        require_once 'inc/func.php';

        if (empty2($username, $password) !== false) {
            exit();
        }

        userLogin($connection, $username, $password);

    }
    ?>

</div>




</body>
</html>