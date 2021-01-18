<?php

$conn = new mysqli('127.0.0.1', 'root', '');

mysqli_select_db($conn,'Reservation');

$sql = "SELECT * FROM reserve";

$records = mysqli_query($conn,$sql);

?>

    <!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
    height: 20px;
    width: 80px;
    float: right;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>

<div class="topnav">
  <a class="active" href="managerhome.php">Home</a>
</div>




<head>
    <title>TABLES</title>
    
    
    <style>
        body{
            background-image:url(table.jpg);
            opacity: 1;
            background-repeat: no-repeat;
            background-size: cover;
        }
        h1{
            text-decoration-color: blanchedalmond;
            text-align: center;
        }
        
    </style><h1 style="color:white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RESERVED TABLES</h1>
  <title>Reserved Table</title>
  <meta charset="utf-8">
<?php
  echo"<style>
      div{
                opacity:1;
                border-radius:5px;
                margin-left:600px;
                text-align:center;
                height: 125px;
                width: 300px;
                background-color:green;
                color: white;
      }
    </style>";
  echo'<meta name="viewport" content="width=device-width, initial-scale=1">';
  echo'<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">';
  echo'<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>';
  echo'<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>';
  echo'<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>';
    
?>
    </head>
    <body>
    <?php
        while($reserve=$records->fetch_assoc())
        {
            echo"<br>";
            echo"<div>","Name : ".$reserve['Name']."<br>", 
            "Phone No : ".$reserve['Phone']. "<br>",
            "Date : ".$reserve['Date']. "<br>",
            "Time : ".$reserve['Time']. "<br>",
            "Guest No : ".$reserve['GuestNo']."</div>";
        }
        
    ?>

    </body>
</html>