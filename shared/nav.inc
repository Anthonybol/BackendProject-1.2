<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
   .nav_bar_index ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
        }
        
    body {
    margin-top: 0;
    margin-left: 0;
    background: rgb(255, 248, 238);
    } 
    .nav_bar_index li a {
    float: left;
    color: rgb(250, 178, 131);
    display: block;
   text-align: center;
   padding: 14px 16px;
   text-decoration: none;
   font-size: 17px;
   }
   .nav_bar_index a:hover {
   background-color: rgb(216, 161, 125);
   color: black;
   } 
    </style>
</head>
<body>

<?php if( isset($_SESSION['user_name']) && !empty($_SESSION['user_name']) )
{
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
<?php }else{ ?>
<div class="nav_bar_index">
<ul>
    <li><a href="../index.php">Home</a></li>
	<li><a href="members.php">Members</a></li>
    <li><a href="members_registration.php" target="openWindow();">Member Registration</a></li>
    <li><a href="new_customer_registration.php" target="openWindow();">Customer Registration</a></li>
    <li><a href="production.php">Production</a></li>
    <li><a href="companybackground.php">Background</a></li>
	<li style="position: absolute; right: 20px;"><a href="login-page.php" target="openWindow();">Login</a></li>

</ul>
</div>
<?php } ?>

</body>
</html>