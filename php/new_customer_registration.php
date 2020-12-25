<?php
//require_once('../mysql.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #dddddd;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            padding: 8px;
        }
    </style>

</head>
<body>
<?php include("../shared/banner.inc"); ?>
<?php include("../shared/nav.inc"); ?>

    <?php


//Variables
$firstName = "";
$lastName = "";
$address = "";
$phoneNumber = "";
$email = "";
$message = "";

//
if(isset($_POST['submit'])) { //Connecting $_POST to submit button
    require_once('../mysql.php');

    //Submitting and posting to Database. These arrays are also connected to what is below in the HTML form.
    $firstName = $_POST['firstName']; 
    $lastName = $_POST['lastName'];
    $address = $_POST['address'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];

    //If fields are empty, display all fields are required. 
    if (!empty($firstName) || !empty($lastName) || !empty($address) || !empty($phoneNumber)) {


        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error()); //If failed, quote connection failed and die.
        }

    } else {
        echo "All fields are required";
        die();
    }

//Inserting details into databse table. Value (?) meaning details are not yet defined. 5 '?' for 5 entries. 
    $INSERT = "INSERT Into customer (CustomerGivenName, CustomerLastName, CustomerAddress, CustomerPhoneNumber, CustomerEmail) values(?,?,?,?,?)";

    //preparing (INSERT) 
    $stmt = $conn->prepare($INSERT);
    //binding parameters/variables as defined above. 
    $stmt->bind_param('sssss',$firstName, $lastName, $address, $phoneNumber, $email);
    $stmt->execute();
    $message = "New Customer Record Added Successfully";

    require_once('../disconnect.php');
}

?>
</div>
<div>

<div> <!--  Form creation below  -->
<form action="new_customer_registration.php" method="post"> 
<div class="container">
<h1>Registration for new customers</h1>
<p>You are a new customer, please register your details to become a member of Bazaar Ceramics<p>
<label for="firstName"><b>First Name</b></label>
<input type="text" name="firstName" required>

<label for="lastName"><b>Last Name</b></label>
<input type="text" name="lastName" required>

<label for="address"><b>Address</b></label>
<input type="text" name="address" required>

<label for="phoneNumber"><b>Phone Number</b></label>
<input type="number" name="phoneNumber" required>

<label for="email"><b>Email</b></label>
<input type="email" name="email" required>

<br><br><span id="error" style="color: red;"><?php echo $message; ?></span><br><br>
<input type="button" name="cancelvalue" value="Cancel" onclick="closeThis();return false;">
<input type="reset" value="Reset">
<input type="submit" name="submit" value="submit">
</div>

<script type="text/javascript" src="../javascript/new_customer_registration.js"></script>

</body>
</html>