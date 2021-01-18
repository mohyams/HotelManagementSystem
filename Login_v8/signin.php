<?php

session_start();
header('location:login.html');

$conn = mysqli_connect('127.0.0.1','root','');

if($conn)
{
    echo "Connection Successful";
}

else
{
    echo"No Connection";
}

mysqli_select_db($conn,'reservation');

$name = $_POST['username'];
$pass = $_POST['Pass1'];
$phone = $_POST['Phone'];
$birthdate = $_POST['Birthdate'];

$q = "select * from register where Username = '$name' ";

$result = mysqli_query($conn,$q);

$num = mysqli_num_rows($result);

if($num == 1)
{
    echo "Username Already Exists";
}
else
{
    $qy = "insert into register(Username,Password,Phone,Birthdate) values ('$name' , '$pass' , '$phone' '$birthdate')";
    mysqli_query($conn,$qy);
}

?>