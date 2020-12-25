<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php session_start()?>


<div class="banner"> <!-- banner div -->
<img class="banner-image" src="images/banner.jpg" alt="bannerimagehere" style="width:100%">
</div>

<?php include("shared/index_nav.inc");?>

<br><br>
    Hey<strong style="color: red"> 
<?php

 //Grabbing username of user
if( isset($_SESSION['user_name']) )
{
echo $_SESSION['user_name']; //echo username of user 
}?> 
<!-- Hey 'username' welcome to our site -->
</strong>
    welcome to the home page


<div class="home_page_intro">
<p>Bazaar Ceramics is committed to producing unique, evocative contemporary Ceramic 
Art of the highest technical quality.</p>  
<p>Our Goals:</p>
<ul>
    <li>To produce unique hand crafted pieces for the individual and corporate collector</li>
    <li>To showcase the best of Australian Ceramic Art and Design</li>
    <li>To provide an extensive range of well crafted and designed domestic ware</li>
    <li>To showcase technical excellence in ceramic technology</li>
</ul>
</div>

<div class="home_page_intro_img">
<img src="images/home_page_intro_img.jpg">
    </div>
<br>

</body>
</html>