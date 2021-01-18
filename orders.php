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



</body>

<head>
    <h1 style="color :white">ORDERS</h1>
  <title>ORDERS</title>
    
    <style>
        body{
            background-image: url(table.jpg);
            opacity: 1;
            background-repeat: no-repeat;
            background-size: cover;
        }
        h1{
            text-decoration-color: black;
            text-align: center;
        }
        
    </style>
    
  <meta charset="utf-8">
<?php
  echo"<style>
      table{
                margin-left:600px;
                text-align:center;
                height: 23px;
                width: 300px;
                color: white;
                font-weight:bold;
                background-color:green;
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

$conn = new mysqli('127.0.0.1', 'root', '');

mysqli_select_db($conn,'Reservation');

for($i=1;$i<=30;$i++)
{
    echo "<br>";
$result = mysqli_query($conn,"SELECT * FROM orders WHERE tableno = $i ");
    echo "<table border='1'>
<tr>
<th>Dish</th>
<th>Quantity</th>
<th>Table No</th>
</tr>";
    
    while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['item_name'] . "</td>";
echo "<td>" . $row['item_quan'] . "</td>";
echo "<td>" . $row['tableno'] . "</td>";
echo "</tr>";
}
 
echo "<tr>";
echo "<td colspan=3>";
echo '<a href="print.php"> Print</a>';
echo "</td>
</tr>";
    echo "</table>";
    
    


}    
        
    ?>

    </body>
</html>