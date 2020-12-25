<?php
ob_start();
session_start();
require_once('../mysql.php');

if(isset($_POST['submit'])) {
    echo "here";

}
//Clear cart. 
if(isset($_POST['Reset'])) {


    $sql = "DELETE FROM orderline WHERE OrderID = " . $_SESSION['order_id_num']; 
    $sql = "DELETE FROM orders WHERE OrderID = " . $_SESSION['order_id_num'];
    $data = mysqli_query($conn, $sql) or die("Bad SQL: $sql");
    unset($_SESSION['order_id_num']);
    header( "location: members.php" );

}

// Delete from cart 1 by 1.
if(isset($_POST['Delete'])) {
    $productId = $_POST['productId'];
    $orderId = $_POST['orderId'];

    $sql = "DELETE FROM orderline WHERE ProductID = '$productId' AND OrderID={$orderId}";
    $data = mysqli_query($conn, $sql) or die("Bad SQL: $sql");
    header( "location: items.php" );

}

if(isset($_POST['Update'])) {
    foreach($_POST['quantity_items_'] as $key => $value) {
        echo "text $key = $value";


      $orderLineUpdate = "UPDATE orderline SET OrderQuantity = '$value' WHERE OrderId={$_POST['orderId']} AND ProductId='{$_POST['productId']}';";
     $data = mysqli_query($conn, $orderLineUpdate) or die(mysqli_error($conn));
     header( "location: items.php" );
    }
}
//------------------------------------------------------------------------------------------------------



if(isset($_POST['Confirm'])) {

    $date = date("Y-m-d");
    $customer_id = $_SESSION['customer_id'];
    $userId = $_SESSION['user_id'];
    $customer_id = intval($customer_id);
    unset($_SESSION['order_id_num']);
    // $quantity = $_SESSION['quant']; 
    //  $quantity = $_POST['quantity_items_'];

    $loop = 0;

    //  $orderLineUpdate = "UPDATE orderline SET OrderQuantity = '$quantity';";
    //  $data = mysqli_query($conn, $orderLineUpdate) or die(mysqli_error($conn));

    //Cusotmer details (no issues)
    $sql = "SELECT * FROM customer WHERE CustomerID = '$customer_id'";
    $data = mysqli_query($conn, $sql) or die("Bad SQL: $sql");
}
    while($row = mysqli_fetch_array($data)) {
        $customer_name = $row['CustomerGivenName'];
        $address = $row['CustomerAddress'];
        $subUrb = $row['CustomerSuburb'];
        $state = $row['CustomerState'];
        $postalCode = $row['CustomerPostCode'];

    }
    ?>
        <h1> Complete Order </h1>
        <h3>Customer Details:</h3>
        <p>*Is required, please confirm your details</p>

    <form action="item_processing.php" method="post">
        Name*:
        <ul><input type="text" name="name" value="<?php echo $customer_name?>"></ul>
        
        Address*:
        <ul><input type="text" name="address" value="<?php echo $address?> "></ul>
        
        Suburb*:
        <ul><input type="text" name="suburb" value="<?php echo $subUrb?>"></ul>
        
        State*:
        <ul><input type="text" name="state" value="<?php echo $state?>"></ul>
        
        Postal Code*:
        <ul><input type="text" name="postalCode" value="<?php echo $postalCode?>"></ul>

        <h3>Item Details:<h3>

<?php


$sql = "select orl.OrderID,p.ProductGlazeTypeCode, p.ProductDescription, p.ProductPrice, orl.OrderQuantity, orl.ProductID from product p 
INNER JOIN orderline orl on orl.ProductID = p.ProductID 
INNER JOIN orders ord on ord.OrderID = orl.OrderID where ord.CustomerID = '$customer_id'";

$data = mysqli_query($conn, $sql) or die("Bad SQL: $sql");
if (mysqli_num_rows($data)) { //$data is the result. In this case, there is 1 row.
    $out = "Success"; //mysqli_num_rows is checking if data is present in database. Also returning number of rows present.
}
$totalRow= mysqli_num_rows($data);
    $total = 0;
    if($totalRow == 0){
       $total = 0;
    }
    while($row = mysqli_fetch_array($data)) {
        $total += $row['OrderQuantity']*$row['ProductPrice'];
        $product_id = $row['ProductID'];
        $order_quantity = $row['OrderQuantity'];
        $order_id = $row['OrderID'];
        if($row['OrderQuantity'] == 0)
        continue;

?>
<h4>Item <?php echo ($loop+1)?><h4>

<table><!--  Order form  -->
<tbody>

<tr border="1">

<tr>
        <td>Product Code:
        <input type="text" name="productCode" value="<?php echo $row['ProductID']?>" readonly>
        </td>

        <td>Quantity Ordered:
        <input type="text" name="quantity" value="<?php echo $row['OrderQuantity']?>">
        </td>

        <td>Unit Price:
        <input type="text" name="price" value="<?php echo $row['ProductPrice']?>" readonly>
        </td>

        <td>Order ID:
        <input type="text" name="orderId" value="<?php echo $row['OrderID']?>" readonly> 
        </td>

        <td>Date:
        <input type="text" name="date" value="<?php echo $date?>" readonly> 
        </td>
        </tr>
        </table>

        <?php
        $loop++;
    }?>
        <h3>Your total:</h3>
        <td><div><a target="_blank"  style="color: red">$<?php echo $total?></div></td><br>

    </form>
<?php

if(isset($_SESSION['order_id_num']) && $_SESSION['order_id_num'] == 1) {
    echo 'error, session is set';
} else if(!isset($_SESSION['order_id_num']) || (isset($_SESION['order_id_num']) && $_SESSION['order_id_num'] == 0)){
    $sql = "DELETE FROM orderline;"; 
    $data = mysqli_query($conn, $sql) or die("Bad SQL: $sql");
}

?>

<input type="button" name="payment" value="Payment" onclick="window.opener.location.reload(true); window.close(); return false;">


    </body>
</html>