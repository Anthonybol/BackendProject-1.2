<!DOCTYPE html>
<html>
<head>
    <title></title>

<style>
  body {
      margin-top: 0;
      margin-left: 0;
      background: rgb(255, 248, 238);
    } 
</style>

</head>
<body>
<?php session_start()?>

<?php include("../shared/banner.inc"); ?>
<?php include("../shared/nav.inc");?>


<br><br>
    Hey<strong style="color: red"> 
<?php

 //Grabbing username of user
if( isset($_SESSION['user_name']) ) //Displaying greeting/username if user is logged in. 
{
echo $_SESSION['user_name']; //echo username of user 
}?> 
<!-- Hey 'username' welcome to our site -->
</strong>
    check out our company background



<br>
<h1> Company Background </h1> 
<br>
<p>Bazaar Ceramics Studio has been operating for 20 years.  
We started as a small collective, operating in the picturesque township of 
Hahndorf, South Australia - known for its quality arts and crafts.</p>  
Over the years the studio has passed through a number of transformations.  
In the first 7 years of its existence - as a co-operative, it was well known for producing 
quality domestic ware and fine individually designed art pieces.</p>
<p>Each member of the co-operative was responsible for designing, throwing, glazing and 
firing their own work. A gallery director was employed to look after the gallery 
and all aspects of marketing.</p> 
<p>The reputation of the studio grew nationally, and production expanded to meet demand, the structure of 
the business changed to its present form.  
Emma Rich bought the business and moved into larger premises in Stepney, Adelaide. 
<p>The production staff increased and currently includes a production manager, 
2 full time ceramic designers and 6 production potters.</p>
<p>Bazaar Ceramics has a wide range of products to meet the needs of clients both nationally and internationally.  
The studio produces exquisite one off sculptural pieces for the individual and corporate collector.</p>  
<p>Commissions make up approximately 40% of this work. </p>
<p>These pieces can be found in board rooms, international hotels and private homes as far away as the US and Germany.
Bazaar Ceramics also produce unique, individually designed domestic ware, including full dinner sets and ovenware.</p>

</body>
</html>