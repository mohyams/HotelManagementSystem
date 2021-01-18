<?php
$conn = new mysqli('127.0.0.1', 'root', '');

mysqli_select_db($conn,'Reservation');
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

for($i=1;$i<=30;$i++)
{
$result = mysqli_query($conn,"SELECT * FROM orders WHERE tableno = $i ");
    echo "<table border='1'>
<tr>
<th>Dish</th>
<th>Quantity</th>
<th>Table NO</th>
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


}





?>