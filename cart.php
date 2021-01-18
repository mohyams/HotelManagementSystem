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
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="cart.php"</script>';  
                }  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>MENU</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:500px;">  
                <h3 align="center">MENU</h3><br />  
                <?php  
                $query = "SELECT * FROM menu ORDER BY ID ASC";  
                $result = mysqli_query($connect, $query); 
               echo "<table border=1>";
                if(mysqli_num_rows($result) > 0)  
                {  
                 while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
                <td><div class="col-md-4">  
                     <form method="post" action="cart.php?action=add&id=<?php echo $row["ID"]; ?>">  
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center"> 
                                <div>
                                    <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['Image']).'" height="100" widht="100"/>';?></div>
                               <h4 class="text-info"><?php echo $row["Dish"]; ?></h4>  
                               <h4 class="text-danger">Rs.<?php echo $row["Price"]; ?></h4>  
                               <input type="text" name="quantity" class="form-control" value="1" />  
                               <input type="hidden" name="hidden_name" value="<?php echo $row["Dish"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>" />  
                               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
                          </div>  
                     </form> 
                    <br>
                    </div> </td>
                <?php  
                     }
                     
                }
                  
               
                ?>  
                <div style="clear:both"></div>  
                <br />  
                <div  style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; position:absolute; padding:16px;">  
                     <h3 style="";>Order Details</h3>  
                     <table class="table table-bordered" border=1>  
                          <tr>  
                               <th>Item Name</th>  
                               <th>Quantity</th>  
                               <th>Price</th>  
                               <th>Total</th>  
                               <th>Action</th>  
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td> <?php echo $values["item_price"]; ?></td>  
                               <td> <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right"><?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
           <br />  
      </body>  
 </html>
   