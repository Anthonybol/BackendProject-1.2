<?php
session_start();

ob_start(); 

?>
<!DOCTYPE html>
<html>

<body>

<?php

$in_user = $_POST['username']; //$in_user now carries (username) and will be posted to database using $_POST.  
$in_password = $_POST['password']; //Similar thing as above. 
$customerId = $_POST['customer_id'];
$hash_password = crypt($in_password,"qwerty"); //$hash_password is now taking '$in_password' and crypt function is hashing it
//so its more secure. As password is posted, qwerty is used as the hashing key which encodes the password. 

require_once('../mysql.php'); //Connection

   if (!$conn) { //------------------------------------------>
       die("Connection failed: " . mysqli_connect_error()); //If failed, quote connection failed and die. 
   }
   else { //If connection success, $sql now does the below. When user logs in, customer name and password checked against table.
       echo "Connected to Database <br>";
       $sql = "SELECT * FROM member WHERE UserID = '$in_user' AND HashedPassword = '$hash_password'";
       $data = mysqli_query($conn, $sql) or die(mysqli_error($conn)); //mysqli_query function Performs 'sql' and 'conn' variables. 
       //$conn specifying the connection to use and $sql is the "SELECT * FROM member WHERE customerName = '$in_user' AND HashedPassword = '$hash_password'".
        if (mysqli_num_rows($data)) { //$data is the result. In this case, there is 1 row. 
            $out = "Success"; //mysqli_num_rows is checking if data is present in database. Also returning number of rows present.
        }
        else { //If password/username is incorrect, prompt user with this page and option to go back. 
            header("Location: http://bazaarceramics.anthonyjames.com.au/../html/failed_login.html"); exit();
        }
        echo $out;
       while($row = mysqli_fetch_array($data)) { //mysqli_fetch_array(data) is fetching a result row (data) which now = $row.
       $id = $row['UserID']; //Selecting row column (UserID) using mysqli_fetch_array to be able to select UserID
       echo $id; 
       $customerId = $row['CustomerID'];

       if(isset($id)){
           $_SESSION['user_id'] = $id; 
           $_SESSION['user_name'] = $in_user; 
           $_SESSION['customer_id'] = $customerId;
           unset($_SESSION['order_id_num']);
           header("Location: http://bazaarceramics.anthonyjames.com.au/php/members.php"); 
           exit;
       }
   }
  }

?>

</body>
</html>