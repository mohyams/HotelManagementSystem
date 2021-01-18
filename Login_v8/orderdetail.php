<!DOCTYPE html>
<html lang="en">
<head>
	<title>Order Details</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
    
    <style>
div.a {
  position: relative;
  left: 130px;
        }
    </style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
                
			
        
					<span class="login100-form-title">
						ORDER DETAILS 
					</span>

					

					
<?php

$conn = new mysqli('127.0.0.1', 'root', '');

mysqli_select_db($conn,'Reservation');

$tableno = $_POST['Dish'];
    
$result = mysqli_query($conn,"SELECT * FROM orders WHERE tableno = $tableno ");
   
    echo '<br>';
    echo '<br>';
    echo '<div class ="a" >';
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
 

    echo "</table>";
    
    

echo '</div>'
   
        
    ?>
			<br>
                <br>
                <br>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="submit" value="submit"> 
							Details 
						</button>
					</div>

					<br>
                    <br>
				
				
			</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>