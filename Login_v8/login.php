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
$password = $_POST['Pass'];

if($username == 'Manager' && $password == 'Rasoie123')
{
    header('location:/Restuarant_web-master/managerhome.php');
}

else{
    
$q = "select * from Register where Username = '$username' && Password = '$password' ";

$result = mysqli_query($conn,$q);

$num = mysqli_num_rows($result);

if($num == 1)
{
    header('location:/Restuarant_web-master/home.html');
}

else
{
    echo "<script>alert('Login NOT Successful!Please Sign Up');</script>";
    header('location:/Restuarant_web-master/Login_v8/login.html');
}

}


?>