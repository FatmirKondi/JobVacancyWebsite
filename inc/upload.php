<?php
if(isset($_POST["submit"])){
    $file = $_FILES["file"];

    $fName=$file["name"];
    $fTempName=$file["tmp_name"];
    $fSize=$file["size"];
    $fError=$file["error"];
    $fType=$file["type"];

    $fileExists=explode('.',$fName);
    $fileActuallyExists = strtolower(end($fileExists));

    $allowed=array('jpeg','png','jpg');

    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "logindb";

    $connection = mysqli_connect($servername, $dbUsername,$dbPassword,$dbname);


    session_start();
    $id=$_SESSION['id'];

    if(in_array($fileActuallyExists, $allowed)){
        if($fError === 0){
            if($fSize<1000000000){
                $fileNameNew="companypicture".$id.".jpg";
                $fileDestination="../images/".$fileNameNew;
                move_uploaded_file($fTempName, $fileDestination);

                $sql="UPDATE pfp SET status=0 WHERE usersId='$id'";
                $result=mysqli_query($connection, $sql);


                header("location: ../profile.php?success");
            }else{
                echo "File too large.";
            }
        }
        else{
            echo "Error uploading file.";
        }

    }
    else{
        echo "Wrong file extension.";
    }

}
