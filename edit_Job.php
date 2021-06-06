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
            <li class="right"><button onclick="location.href='inc/logout.php'">Sign Out</button></li>
            <li class="right"><button onclick="location.href='main_page.php'">Home Page</button></li>
        </ul>
    </section>
</header>


<?php

session_start();
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "logindb";

$usersId= $_SESSION['id'];

$connection = mysqli_connect($servername, $dbUsername,$dbPassword,$dbname);

$sql="SELECT * FROM jobs WHERE usersId='$usersId'";

$result=mysqli_query($connection, $sql);

echo "<form action='inc/Job_delete.php' method='post' enctype='multipart/form-data'>";
echo "<table>";
echo "<tr>";
echo "<th>Job Title</th>";
echo "<th>Job Category</th>";
echo "<th>Job Description</th>";
echo "<th>Select</th>";
echo "</tr>";
while($row=mysqli_fetch_assoc($result)){
    echo "<tr>";
    echo "<td>".$row['jobTitle']."</td>";
    echo "<td>".$row['category']."</td>";
    echo "<td>".$row['description']."</td>";
    echo "<td><input type='checkbox' name='jobId[]' value='".$row['jobId']."'></td>";

    echo "</tr>";
}
echo "</table>";
echo "</form>";
echo "<button id='delButton' type='submit' name='delete'>Delete Job</button>";
?>

<form id='jobForm' action='inc/Job_add.php' method='post' enctype='multipart/form-data'>
    <label>Job Title: </label>
    <input type='text' name='title' />
    <label>Job Category: </label>
    <input type='text' name='category'/>
    <label>Job Description: </label>
    <textarea id="descText" name="Job description"></textarea>

    <button type='submit' name='submit'>Add Job</button>


</form>


</body>
</html>
