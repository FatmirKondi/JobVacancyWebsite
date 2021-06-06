<?php
session_start();
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "logindb";

$conn = mysqli_connect($servername, $dbUsername,$dbPassword, $dbname);

if(isset($_POST['delete']))
{
    if(!empty($_POST['jobId'])) {
        foreach ($_POST['jobId'] as $value){

            $sql="DELETE FROM jobs WHERE jobId='$value'";
            $result = mysqli_query($conn, $sql);
        }
    }

    header("location: ../edit_Job.php");
}
