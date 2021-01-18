<?php

/*$firstname=$_POST['first_name'];
$lastname=$_POST['last_name'];
$contact=$_POST['phone'];
$date=$_POST['datepicker'];
$time=$_POST['time'];
$email=$_POST['email'];
$state=$_POST['state'];
$guest=$_POST['guest'];
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "restaurant";
*/
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

$Name = $_POST['name'];
$Phone = $_POST['phone'];
$Date = $_POST['datepicker'];
$GuestNo = $_POST['guest'];
$Time = $_POST['time'];
    
$sql="INSERT INTO Reserve(Name,Phone,GuestNo,Date,Time) VALUES ('$Name','$Phone','$GuestNo','$Date','$Time')";

if (!mysqli_query($conn,$sql))
{
    
} 
else 
{
    
}

header("refresh:0;url=reservation.html");

?>