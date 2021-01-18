<?php   
 session_start();  
 $connect = mysqli_connect("127.0.0.1", "root", "", "Reservation");  


 if(isset($_POST["add_to_cart"]))    
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           
      }
     
     elseif(in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }
     
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["id"],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);    
                }  
           }  
      }  
 }
if(isset($_POST["someAction"]))
{          
           if(!empty($_SESSION["shopping_cart"]))  
                          {    $tableid = $_POST["tableno"];

  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {
                                $id=$values["item_id"];
                                $name=$values["item_name"];
                                $quantity=$values["item_quantity"];

                                  $sql="INSERT INTO orders(item_id,item_name,item_quan,tableno) VALUES ('$id','$name','$quantity','$tableid')";

                                  if (!mysqli_query($connect,$sql))
                                  {
                                        
                                  } 
                                  else 
                                  {
                                        
                                 }
                          
                               }  
                          }

  

        
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                      
                }  
           }  
      }  

 ?>  
<!DOCTYPE html>
<html lang="en">
<head>
<title>MENU</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
     <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css" media="screen" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/style-portfolio.css">
        <link rel="stylesheet" href="css/picto-foundry-food.css" />
        <link rel="stylesheet" href="css/jquery-ui.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link rel="icon" href="favicon-1.ico" type="image/x-icon">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/nivo-lightbox.css">
    <link rel="stylesheet" href="css/nivo_themes/default/default.css">
    <link rel="stylesheet" href="css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
<style>
* {
    box-sizing: border-box;
}

body {
    font-family: Arial, Helvetica, sans-serif;
}



/* Create two columns/boxes that floats next to each other */
nav1 {
    float: left;
    width: 70%;
    background-color:black;
    padding: 20px;
    margin-top: 50px;
}

/* Style the list inside the menu */
nav1 ul {
    list-style-type: none;
    padding: 0;
}

article {
    float: right;
    width: 30%;
    background-color:white;
    margin-top: 100px;
    
}

/* Clear floats after the columns */
section:after {
    content: "";
    display: table;
    clear: both;
}



/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
@media (max-width: 600px) {
    nav, article {
        width: 100%;
        height: auto;
    }
}
</style>
</head>
<body>


<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="row">
                <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Rasoie Dining</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav main-nav  clear navbar-right ">
                            <li><a class="color_animation" href="managerhome.php">WELCOME</a></li>
                            <li><a class="color_animation" href="managertables.php">RESERVED TABLES</a></li><li><a class="color_animation" href="orders.php">ORDERS</a></li>
                             <li><a class="navactive color_animation" href="managermenu.php" >MENU</a></li>
                            <li><a class="color_animation" href="Login_v8/adddish.html" >ADD DISH</a></li>
                            <li><a class="color_animation" href="index.html" >LOGOUT</a></li>
                            
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </div><!-- /.container-fluid -->
        </nav>



<section>
  <nav1>
    <h3 align="center" style="color:white">MENU</h3><br />  
                <?php  
                $query = "SELECT * FROM menu ORDER BY ID ASC";  
                $result = mysqli_query($connect, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
                <div class="col-md-4" style="display:inline-block;">  
                     <form method="post" action="managermenu.php?action=add&id=<?php echo $row["ID"]; ?>">  
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; width:250px; position:relative;" align="center"> 
                                <div><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['Image']).'" height="100" widht="100"/>';?></div>
                               <h4 class="text-info"><?php echo $row["Dish"]; ?></h4>  
                               <h4 class="text-danger">Rs.<?php echo $row["Price"]; ?></h4>  
                               <input type="text" name="quantity" class="form-control" value="1" />  
                               <input type="hidden" name="hidden_name" value="<?php echo $row["Dish"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>" />  
                               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
                          </div>
                     </form> 
                    <br>
                </div> 
                <?php  
                     }
                }  
                ?>  
  </nav1>
  
    <article>
    <div class="col-25">
    <div class="container">
      <h4>Cart &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>Price</b></span></h4>
                        <table>  
                          <tr>  
                               <th>ItemName</th>  
                               <th>Quantity</th>  
                               <th>&nbsp;&nbsp;Price</th>    
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td align="center"><?php echo $values["item_name"]; ?></td>  
                               <td align="center"><?php echo $values["item_quantity"]; ?></td>  
                               <td align="center"> <?php echo $values["item_price"]; ?></td>  
                                 
                               <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="managermenu.php?ssssssaction=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td> 
                               <td colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="6" align="center">Total</td>  
                               <td align="right"><?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>
                          <?php  
                          }  
                          ?>  
                     </table>
<form action="managermenu.php" method="post">
    <input type="submit" name="someAction" value="GO" align="center" onclick="function()"/>
    <input type="text" name="tableno" size="4" required maxlength="4">
    </form>
                </div>  
      </div>
  </article>
</section>


</body>
</html>
