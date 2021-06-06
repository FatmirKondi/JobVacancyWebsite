<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Job Vacancies Website</title>
    <link rel="stylesheet" href="src/style.css" type="text/css">
</head>
<body>

<header>
    <section>
        <ul>
            <li class="left"><img src="images/logo.png" id="logo" width="200" height="100"></li>
            <li class="right" ><button onclick="location.href='login_page.php'">Sign In</button></li>
            <li class="right"><button onclick="location.href='main_page.php'">Home Page</button></li>
        </ul>
    </section>
</header>

<?php

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "logindb";

$connection = mysqli_connect($servername, $dbUsername, $dbPassword, $dbname);

if (isset($_POST['details'])) {

    if (!empty($_POST['jobId'])) {
        foreach ($_POST['jobId'] as $value) {

            $sql = "SELECT * FROM jobs WHERE jobId='$value'";
            $result = mysqli_query($connection, $sql);

            while($row=mysqli_fetch_assoc($result)){
                $usersId=$row['usersId'];
                $sqlUser="SELECT * FROM users WHERE usersId='$usersId'";
                $resultUsers=mysqli_query($connection,$sqlUser);

                while($rowUsers=mysqli_fetch_assoc($resultUsers)){
                    $companyName=$rowUsers['companyName'];
                    $contact=$rowUsers['phoneNumber'];

                }
                $jobTitle=$row['jobTitle'];
                $category=$row['category'];
                $descJob=$row['description'];
                $cityName=$row['cityName'];

                echo "<div>";
                echo "<form id='detailBox'>";
                echo "<img src='images/companypicture".$usersId.".jpg' width='188' height='188'>";
                echo "<h1>$companyName</h1>";

                echo "<div class='detailsText'><label>Job Title: $jobTitle</label><br/>
                      <label>Job Category: $category</label><br/>
                      <label>City: $cityName</label><br/>
                      <label>Job Description: $descJob</label><br/>
                      <label>Contact: $contact</label></div>";

                echo "</form>";
                echo "</div>";
            }
        }
    }
}
else{
    header("location: ../main_page.php");
}
?>
</body>
</html>
