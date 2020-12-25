<?php
ob_start();
session_start(); 
error_reporting(E_ALL);
ini_set('display_errors', 1);
if(!isset($_SESSION['user_name'])){ 
    echo "<script>
        alert('Please login');
        window.location.href='javascript:history.go(-1)'; 
        </script>"; 
    exit;
}
?>

<html>
<head> 

</head>
<body>

<?php
require_once('../mysql.php');
$userId = $_SESSION['user_id'];
$customer_id = $_SESSION['customer_id'];

$customer_id = intval($customer_id);


$sql = "select orl.OrderID,p.ProductGlazeTypeCode, p.ProductDescription, p.ProductPrice, orl.OrderQuantity, orl.ProductID from product p 
INNER JOIN orderline orl on orl.ProductID = p.ProductID 
INNER JOIN orders ord on ord.OrderID = orl.OrderID where ord.CustomerID = '$customer_id'";
$data = mysqli_query($conn, $sql) or die("Bad SQL: $sql");
if (mysqli_num_rows($data)) { //$data is the result. In this case, there is 1 row.
    $out = "Success"; //mysqli_num_rows is checking if data is present in database. Also returning number of rows present.
    
}else{
//    echo "Not able to fetch data from database";
}
$loop = 0;

$totalRow= mysqli_num_rows($data);

if($totalRow == 0){
    echo '<script language="javascript">';
    echo 'alert("Please add to your shopping cart")';
    echo '</script>';
    echo "<script type='text/javascript'>  window.location='members.php'; </script>";
}

while($row = mysqli_fetch_array($data)) {
    $total = $row['OrderQuantity']*$row['ProductPrice'];
    $productId = $row['ProductID'];
    $productQty = $row['OrderQuantity'];
    if($row['OrderQuantity'] == 0)
        continue;

?>


<h1> Item: <?php echo ($loop+1)?></h1>

<form action="item_processing.php" method="post">
<table><!--  Order form  -->
<tbody>


<p><?php echo $row['ProductDescription']?>


<tr border="1">

        <td>Product Code:</td>
        <td colspan = "2">
        <input type="text" name="productCode" value="<?php echo $row['ProductID']?>" readonly>
        </td>

        <td>Quantity Ordered:</td>
        <td colspan = "2">
        <input type="number" min="1" name="quantity_items_[<?php echo $productQty; ?>]" id ="quantity_items_[<?php echo $productQty; ?>]" value="<?php echo $productQty?>">

        
        </td>

        <td>Unit Price:</td>
        <td colspan = "2">
        <input type="text" name="price" value="<?php echo $row['ProductPrice']?>" readonly>
        </td>

        <input type="hidden" name="productId" value="<?php echo $productId?>">
        <input type="hidden" name="orderId" value="<?php echo $_SESSION["order_id_num"]?>">
        <input type="hidden" name="total" value="<?php echo $total?>">
        <td><div style="color: red">$<?php echo $total?></div></td>
        
        <td><input type="submit" name="Update" value="Update Qty"></td>

        <td><input type="submit" name="Delete" value="Delete"></td>


</tr>
</table>
</form>
<?php
    $loop++;
}
?>
<!--<button type="submit" name="Confirm">Confirm Order</button>-->

<?php
//Total
$customer_id = $_SESSION['customer_id'];

$customer_id = intval($customer_id);
require_once('../mysql.php');

    $sql = "select  p.ProductPrice, orl.OrderQuantity from product p 
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
        $total += $row['OrderQuantity'] * $row['ProductPrice'];
    }

    ?>

    <ul>
        <li><a target="_blank" style="color: red">($<?php echo $total?>) is your total price </a></li>
    </ul>


 <form action="item_processing.php" method="post">
<button type="submit" name="Confirm">Confirm Order</button>
</form>


<form action="item_processing.php" method="post" class="clearCart">
<button type="submit" name='Reset'>Clear Cart</button>
</form>

<input type="button" name="cancelvalue" value="Close" onclick="window.opener.location.reload(true); window.close(); return false;">


</body>
</html>