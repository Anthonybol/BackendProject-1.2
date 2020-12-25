<?php
  require_once('../mysql.php');

session_start();
    unset($_SESSION['user_id']); //Frees all login session variables 
    unset($_SESSION['user_name']); //Frees all login session variables

    if(isset($_SESSION['order_id_num'])){

    $sql = "DELETE FROM orderline WHERE OrderID = " . $_SESSION['order_id_num']; 
    $sql = "DELETE FROM orders WHERE OrderID = " . $_SESSION['order_id_num'];
    $data = mysqli_query($conn, $sql) or die("Bad SQL: $sql");
    unset($_SESSION['order_id_num']);
    header( "location: ../index.php" );
    exit;
    }
else{
    header( "location: ../index.php" );
    exit;
}
?>
