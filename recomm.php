<?php

$conn = new mysqli('127.0.0.1', 'root', '');

mysqli_select_db($conn,'Reservation');

$sql = "SELECT item_name, MAX(CAST(item_quan AS SIGNED))
FROM orders
GROUP BY item_quan ORDER BY item_quan DESC
LIMIT 3";
$records = mysqli_query($conn,$sql);

$image="SELECT Image FROM menu WHERE Dish = (SELECT item_name,MAX(CAST(item_quan AS SIGNED))
FROM orders
GROUP BY item_quan ORDER BY item_quan DESC
LIMIT 3)";

$recomm= mysqli_query($conn,$image);
?>

<!DOCTYPE html>
<html>
<head>
    <title>RECOMMENDATIONS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
    height: 20px;
    width: 80px;
    float:right;
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
    body{
            margin-top: 200px;
            background-image: url(images.jpg);
            opacity: 1;
            background-repeat: no-repeat;
            background-size: cover;
        }
        h1{
            text-decoration-color: black;
            text-align: center;
        }
        
</style>
</head>
<body>

<p class="topnav">
  <a class="active" href="newmenu.php">MENU</a>
</p>



    
    
    
       
  <meta charset="utf-8">
<?php
  echo"<style>
      div{      
                margin-top:60px;
                opacity:0.9;
                border-radius:5px;
                margin-left:600px;
                text-align:center;
                height: 100px;
                width: 300px;
                background-color:#F08080;
                color: black;
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
            echo"<div>","WE RECOMMEND YOU"."<br>"."<br>".$reserve['item_name']."<br>".
            
            "</div>";
            
        }
        
    ?>

    </body>
</html>