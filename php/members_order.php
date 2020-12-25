<?php
ob_start();
?>
<?php 
session_start()
?>
<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="../css/members_order.css"><!--  Link to CSS-->

</head>

<body class="body">

<?php include("../shared/banner.inc"); ?>

<?php if( isset($_SESSION['user_name']) && !empty($_SESSION['user_name']) ){
}
?>
<div class="nav_bar_index">
<ul>
      <li><a href="../index.php">Home</a></li>
      <li><a href="members.php">Members</a></li>
      <li><a href="production.php">Production</a></li>
      <li><a href="companybackground.php">Background</a></li>
      <li style="position: absolute; right: 20px;"><a href="logout.php">Logout</a></li>

</ul>
</div>

    <div class ="content"> <!-- Class of all content -->
      
<br><br>
    Hey<strong style="color: red"> 
<?php

//Grabbing username of user
if( isset($_SESSION['user_name']) )//Displaying greeting/username if user is logged in. 
{
echo $_SESSION['user_name'];//echo username of user 
}?> 
<!-- Hey 'username' welcome to our site -->
</strong>
    place your order below
<br><br>
   <!-- Image table class -->
  <div class="div_table">
  <table  id="imageTable" cellspacing="0" cellpadding="0" border="0">
  </table>
  </div>

  <?php
  require_once('../mysql.php');

//PHP code for ORDER FORM

$error = "";
if(isset($_POST['cart'])) {
    $name =  $_POST['itemDescription'];
    $quantity =  $_POST['thisQty'];
    $OrderID = "OrderId";
    $date = date("Y-m-d");
    $customerId = $_SESSION['customer_id'];
    // $OrderID = $_SESSION['order_id_num'];
    $productId = "";

    $sql = "SELECT * FROM product WHERE ProductID = '$name'";
    $data = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if (mysqli_num_rows($data) >0) {
 echo '<script language="javascript">'; 
        echo 'alert("Item has already been added to cart! Please adjust the quantity in your cart.")';
        echo '</script>';
        echo "<script type='text/javascript'>  window.location='http://bazaarceramics.anthonyjames.com.au/php/members.php'; </script>";
    }
    else {
        $error = "No product found";
    }

    if($error == ""){
        while ($row = $data->fetch_assoc()) {
            $productId = $row['ProductID'];
        }
    
    if(isset($_SESSION['order_id_num'])){
	
         echo "Favorite color is " . $_SESSION["order_id_num"] . ".<br>";
        $OrderID = "SELECT OrderID FROM orders ORDER BY OrderID DESC LIMIT 1;";
        $data= mysqli_query($conn, $OrderID) or die(mysqli_error($conn));
        while($row = $data->fetch_assoc()) {
        $OrderID = $row['OrderID'];

        $orderLineInsert = "INSERT INTO orderline (OrderID,ProductID,OrderQuantity) VALUES ( '$OrderID' ,'$productId' ,'$quantity');";
        $data = mysqli_query($conn, $orderLineInsert) or die(mysqli_error($conn));

        header("Location: members.php");
            }
    }
        
        else{
            
                $orderInsert = "INSERT INTO orders (OrderID, CustomerID, OrderDate) VALUES ('$OrderID', '$customerId', '$date')";
                $data = mysqli_query($conn, $orderInsert);
                $OrderID = "SELECT OrderID FROM orders ORDER BY OrderID  DESC LIMIT 1;";
                $data= mysqli_query($conn, $OrderID) or die(mysqli_error($conn));
                while
                ($row = $data->fetch_assoc()) {
                $OrderID = $row['OrderID'];
                
        
                $orderLineInsert = "INSERT INTO orderline (OrderID,ProductID,OrderQuantity) VALUES ('$OrderID' ,'$productId' ,'$quantity');";
                $data = mysqli_query($conn, $orderLineInsert) or die(mysqli_error($conn));

                $_SESSION['order_id_num'] = $OrderID;

                header("Location: members.php");
        
        }
        }
        }
        }

?>

<div class ="formContent">
            <form action="members_order.php" id="orderForm" name="orderForm" method="post" onsubmit="return validateForm();"> <!-- alidate form for errors -->
                <div class="Order Item">
                <h2>Order Item</h2><br>

                <table width="200" border="1"><!--  Order form  -->
                    <tbody>
                    <tr>
                  <tr>
                  <td>Item Description</td>
                  <td colspan = "2">
                <input name="itemDescription" id="itemDescription" type="text" readonly/>

              </td>
              </tr>
              <tr>
                  <td>Quantity:</td>
                  <td colspan="2">
                      <input type="number" value="1" name="thisQty" id="thisQty"  onChange="calculateOrder()"/>
              </td>
            </tr>
            <tr>
                <td>Price:</td>
                <td colspan="2"> 
                <div id="priceDiv" >
                  <input type="number" name="price" id="price" onChange="calculateOrder()" readonly/>
                  </div>
                </td>
            </tr>
            <tr>
                <td>Total Price:</td>
                <td colspan="2"> 
                <div id="totalPriceDiv"> 
                <input type="number" name="totalPrice" id="totalPrice"  readonly/>
                </div>
              </td>
            </tr>
  

                    <!-- <tr>
                        <td>
                            <input type="button" name="resetButton" id="resetButton" value="Reset"  onclick="reset(thisQty);reset(totalPrice);reset(price);" />
                        </td> -->

                        <!-- <td style="text-align: center;">
                            <input type="button" name="calculateButton" id="calculateButton" value="Calculate" 
                            onclick="calculateCheck(document.getElementById('thisQty').value);"/>

                        </td> -->
                        <text style="color: red"><?php echo $error ?></text>
                        <br><br>
                        <td style="text-align: right;">
                            <input type="submit" name="cart" id="cart" value="Add to Cart"  onclick="return AddToCart()"/>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
  
  <script type="text/javascript" src="../javascript/members_order.js"></script>

</body>
</html>