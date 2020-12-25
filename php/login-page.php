
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
<link rel="stylesheet" href="../css/login-page.css"><!--  Link to CSS-->

</head>
<body>

<?php include("../shared/nav.inc");?>


<h1>Login Here</h1>
<div class="login-page-form">
<!-- Posting to lgin php file -->
<form name="input" method="POST" action="login.php"> 
<p>
<label for="a">Username:</label>
<!-- Username box -->
<input type="text" input id="a" name="username"><br>
</p>
<p>
<label for="b">Password:</label>
<!-- password box -->
<input type="password" input id="b" name="password"><br>
</p>
<br><br>
<!-- Login button -->
<input type="submit" value="Login">
<input type="button" name="cancelvalue" value="Cancel" onclick="closeThis();return false;">

</form>
</div>
<script type="text/javascript" src="../javascript/login.js"></script>
</body>
</html>

<?php
require_once('../mysql.php');
?>