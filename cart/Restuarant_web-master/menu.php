<html>
<head>
    <title></title>   


<?php
        if(isset($_POST['submit']))
        {
            if(getimagesize($_FILES['Image']['tmp_name'])==FALSE)
            {
                echo "Failed";
            }
            else
            {
                $dish=$_POST['Dish'];
                $price=$_POST['Price'];
                $name=addslashes($_FILES['Image']['tmp_name']);
                $image=addslashes(file_get_contents($_FILES['Image']['tmp_name']));
                saveimage($name,$image,$price,$dish);
            }
        }
        function saveimage($name,$image,$price,$dish)
        {
            $conn = mysqli_connect('127.0.0.1','root','','Reservation');
            $sql = "insert into menu(Imagename,Price,Image,Dish) values ('$name','$price','$image','$dish')";
            $query = mysqli_query($conn,$sql);
            if($query)
            {
                echo"Successful";
            }
            else
            {
                echo "Not uploaded";
            }
        }
?>

<?php

$conn = new mysqli('127.0.0.1', 'root', '');

mysqli_select_db($conn,'Reservation');

$sql = "SELECT * FROM menu";

$records = mysqli_query($conn,$sql);

?>


    
    
    
    
  <meta charset="utf-8">
<?php
  echo"<style>
      div{
                opacity:0.7;
                border-radius:5px;
                margin-left:600px;
                text-align:center;
                height: 125px;
                width: 300px;
                background-color: antiquewhite;
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
        while($menu=$records->fetch_assoc())
        {
            echo"<br>";
            echo"<div>","Dish : ".$menu['Dish']."<br>", 
            "Price : ".$menu['Price']. "<br>",
            "</div>";
            echo "<div>";
            echo '<img src="data:image/jpeg;base64,'.base64_encode($menu['Image'] ).'" height="100" widht="100"/>';
            echo"</div>";
        }
        echo"</tr>";
        echo"</table>";
    ?>

    </body>
</html>