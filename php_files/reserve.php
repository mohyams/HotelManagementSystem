<?php
$firstname=$_POST['first_name'];
$lastname=$_POST['last_name'];
$contact=$_POST['phone'];
$date=$_POST['datepicker'];
$guest=$_POST['guest'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql="insert into reservation values('".$firstname."','".$lastname."','".$contact."','".$date."','".$guest."')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>