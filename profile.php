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

            <li class="right"><button onclick="location.href='inc/logout.php'" >Sign Out</button></li>

            <li class="right"><button onclick="location.href='main_page.php'">Home Page</button></li>
        </ul>
    </section>
</header>

<?php

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "logindb";

$connection = mysqli_connect($servername, $dbUsername,$dbPassword,$dbname);

session_start();


if(isset($_SESSION['id']))
{

    $id=$_SESSION['id'];

    $sqlImg="SELECT * FROM pfp WHERE usersId='$id'";
    $resultImg=mysqli_query($connection,$sqlImg);
    while($rowImg=mysqli_fetch_assoc($resultImg)){
        echo "<div class='alignBox'><div class='imageBox'>";
        echo "<div class='user-profile' id='profilePicture'> ";

        if($rowImg['status']==0){
            echo "<img src='images/companypicture".$id.".jpg' width='200' height='200'>";
        }
        else{
            echo "<img src='C:\xampp\htdocs\midterm\images\defaultpicture.jpg' width='200' height='200'>";
        }

        echo "</div>";
    }


    echo "<form id='updatePicture' action='inc/upload.php' method='post' enctype='multipart/form-data'>
            <input type='file' name='file'/>
            <button type='submit' name='submit'>Upload Picture</button>
        </form>";
    echo "</div>";

    echo "<div id='formBox'><form id='userData' action='inc/update.php' method='post' enctype='multipart/form-data'>
            <label>Company: </label>
            <input type='text' name='companyname' value='" .$_SESSION['company']."'/><br>
            <label>City: </label>
            <input type='text' name='cityname' value='".$_SESSION['city']."'/><br>
            <label>Phone: </label>
            <input type='text' name='phone' value='".$_SESSION['phone']."'/><br>
            <button type='submit' name='submit'>Update Listing</button>
        </form></div></div>";


}

?>

<button id="editButton" onclick="location.href='edit_Job.php'">Edit Job Listing</button>


</body>
</html>
