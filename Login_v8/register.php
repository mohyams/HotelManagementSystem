<?php
// Create connection
$conn = new mysqli('127.0.0.1', 'root', '');
// Check connection
if (!$conn) {
    echo 'Not Connected to Server';
} 

if(!mysqli_select_db($conn,'Reservation'))
{
    echo 'Database Not Selected';
}

$username = $_POST['username'];
$phone = $_POST['Phone'];
$birthdate = $_POST['Birthdate'];
$password = $_POST['Pass1'];
    
$q = "select * from Register where Username = '$username' ";

$result = mysqli_query($conn,$q);

$num = mysqli_num_rows($result);

if($num == 1)
{
    echo "Username Already Exists";
}

else
{
    $sql="INSERT INTO Register(Username,Phone,Birthdate,Password) VALUES ('$username','$phone','$birthdate','$password')";
}

if (!mysqli_query($conn,$sql))
{
    header("location:login.html");
    
} 
else 
{
    header("location:login.html");
}



?>