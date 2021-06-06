<?php

function empty1($coname,$cityname,$username,$password)
{
    $result=true;
    if(empty($coname) || empty($cityname) || empty($username) || empty($password))
    {
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}
function empty2($username,$password)
{
    $result=true;
    if(empty($username) || empty($password))
    {
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}
function userCreate($connection, $coname, $cityname, $username, $password){

    $sql="INSERT INTO users (username, companyName, cityName, upassword, phoneNumber) VALUES(?,?,?,?,'Add Number');";

    $stmt= mysqli_stmt_init($connection);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssss", $username, $coname,$cityname,$password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $sql = "SELECT username, upassword , usersId , cityName, companyName, phoneNumber FROM users;";

    $result=mysqli_query($connection, $sql);

    while($row = mysqli_fetch_assoc($result))
    {
        $checkUs=$row["username"];
        $checkPass=$row["upassword"];
        $id=$row["usersId"];

        if($username==$checkUs && $password== $checkPass)
        {
            session_start();
            $_SESSION['id']=$id;
            $_SESSION['company']=$row['companyName'];
            $_SESSION['city']=$row['cityName'];
            $_SESSION['phone']=$row['phoneNumber'];

            $sqlPfp="INSERT INTO pfp(usersId,status) VALUES ('$id', 1)";
            mysqli_query($connection,$sqlPfp);
            header("location: ../midterm/profile.php");
            exit();
        }
    }
        exit();
}

function userLogin($connection, $username, $password)
{


    $sql = "SELECT username, upassword , usersId, cityName, companyName, phoneNumber FROM users;";

    $result=mysqli_query($connection, $sql);

    while($row = mysqli_fetch_assoc($result))
    {
        $checkUs=$row["username"];
        $checkPass=$row["upassword"];
        $id=$row["usersId"];

        if($username==$checkUs && $password== $checkPass)
        {
            session_start();
            $_SESSION['id']=$id;
            $_SESSION['company']=$row['companyName'];
            $_SESSION['city']=$row['cityName'];
            $_SESSION['phone']=$row['phoneNumber'];

            header("location: ../midterm/profile.php");

            exit();
        }

    }

    exit();



}
