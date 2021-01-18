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
                header("location:/managermenu.php");
            }
            else
            {
                echo "Not uploaded";
            }
        }
?>



    
    
    
    
  