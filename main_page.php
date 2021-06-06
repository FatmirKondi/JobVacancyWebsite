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
<form class="form" action="main_page.php" method="post" enctype="multipart/form-data" >

    <input type="text" name="categoryFilter" value="" placeholder="Search by Category"/>
    <input type="text" name="cityFilter" value="" placeholder="Search by City"/>
    <button type="submit" name="search">Search</button>

</form>


<?php

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "logindb";
$connection = mysqli_connect($servername, $dbUsername,$dbPassword,$dbname);

session_start();

if(empty($_POST['cityFilter'])&& empty($_POST['categoryFilter']))
{
    $_SESSION['cityFilter']="";
    $_SESSION['categoryFilter']="";
}
else{
    $_SESSION['cityFilter']=$_POST['cityFilter'];
    $_SESSION['categoryFilter']=$_POST['categoryFilter'];
}


if(empty($_SESSION['cityFilter'])&& empty($_SESSION['categoryFilter']))
{

    $sql="SELECT * FROM jobs";

    $result=mysqli_query($connection, $sql);

    echo "<form action='attributes.php' method='post' enctype='multipart/form-data'>";
    echo "<table>";
    echo "<tr>";
    echo "<th>Job Title</th>";
    echo "<th>Job Category</th>";
    echo "<th>Job Description</th>";
    echo "<th>City</th>";
    echo "<th>Select</th>";
    echo "</tr>";

    while($row=mysqli_fetch_assoc($result)){
        echo "<tr>";

        echo "<td>".$row['jobTitle']."</td>";
        echo "<td>".$row['category']."</td>";
        echo "<td>".$row['description']."</td>";
        echo "<td>".$row['cityName']."</td>";
        echo "<td><input type='checkbox' name='jobId[]' value='".$row['jobId']."'></td>";


        echo "</tr>";
    }
    echo "</table>";

    echo "<button type='submit' name='details'>Job Details</button>";
    echo "</form>";
    session_destroy();
}

elseif(!empty($_SESSION['cityFilter']) && empty($_SESSION['categoryFilter']))
{

    $city=$_SESSION['cityFilter'];

    $sql="SELECT * FROM jobs WHERE cityName='$city'";

    $result=mysqli_query($connection, $sql);

    echo "<form action='attributes.php' method='post' enctype='multipart/form-data'>";
    echo "<table>";
    echo "<tr>";
    echo "<th>Job Title</th>";
    echo "<th>Job Category</th>";
    echo "<th>Job Description</th>";
    echo "<th>City</th>";
    echo "<th>Select</th>";
    echo "</tr>";
    while($row=mysqli_fetch_assoc($result)){
        echo "<tr>";

        echo "<td>".$row['jobTitle']."</td>";
        echo "<td>".$row['category']."</td>";
        echo "<td>".$row['description']."</td>";
        echo "<td>".$row['cityName']."</td>";
        echo "<td><input type='checkbox' name='jobId[]' value='".$row['jobId']."'></td>";


        echo "</tr>";
    }
    echo "</table>";

    echo "<button type='submit' name='details'>Job Details</button>";
    echo "</form>";
    session_destroy();
}


elseif(empty($_SESSION['cityFilter']) && !empty($_SESSION['categoryFilter']))
{
    $category = $_SESSION['categoryFilter'];

    $sql="SELECT * FROM jobs WHERE category='$category'";

    $result=mysqli_query($connection, $sql);

    echo "<form action='attributes.php' method='post' enctype='multipart/form-data'>";
    echo "<table>";
    echo "<tr>";
    echo "<th>Job Title</th>";
    echo "<th>Job Category</th>";
    echo "<th>Job Description</th>";
    echo "<th>City</th>";
    echo "<th>Select</th>";
    echo "</tr>";
    while($row=mysqli_fetch_assoc($result)){
        echo "<tr>";

        echo "<td>".$row['jobTitle']."</td>";
        echo "<td>".$row['category']."</td>";
        echo "<td>".$row['description']."</td>";
        echo "<td>".$row['cityName']."</td>";
        echo "<td><input type='checkbox' name='jobId[]' value='".$row['jobId']."'></td>";


        echo "</tr>";
    }
    echo "</table>";

    echo "<button type='submit' name='details'>Job Details</button>";
    echo "</form>";
    session_destroy();
}


else if(!empty($_SESSION['cityFilter'])&& !empty($_SESSION['categoryFilter'])){

    $city=$_SESSION['cityFilter'];
    $category=$_SESSION['categoryFilter'];

    $sql="SELECT * FROM jobs WHERE cityName='$city' AND  category='$category'";

    $result=mysqli_query($connection, $sql);

    echo "<form action='attributes.php' method='post' enctype='multipart/form-data'>";
    echo "<table>";
    echo "<tr>";
    echo "<th>Job Title</th>";
    echo "<th>Job Category</th>";
    echo "<th>Job Description</th>";
    echo "<th>City</th>";
    echo "<th>Select</th>";
    echo "</tr>";

    while($row=mysqli_fetch_assoc($result)){
        echo "<tr>";

        echo "<td>".$row['jobTitle']."</td>";
        echo "<td>".$row['category']."</td>";
        echo "<td>".$row['description']."</td>";
        echo "<td>".$row['cityName']."</td>";
        echo "<td><input type='checkbox' name='jobId[]' value='".$row['jobId']."'></td>";


        echo "</tr>";
    }
    echo "</table>";

    echo "<button type='submit' name='details'>Job Details</button>";
    echo "</form>";
    session_destroy();
}


?>



</body>
</html>
