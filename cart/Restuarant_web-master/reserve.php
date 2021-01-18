<?php
$firstname=$_POST['first_name'];
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

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql="INSERT INTO reservation(name,lastname,phone,guestno,tableno,email,date1,time1) VALUES('".$firstname."','".$lastname."','".$contact."','".$guest."','".$state."','".$email."','".$date."','".$time."')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>