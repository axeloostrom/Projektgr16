<?php
$uname = "dbtrain_850";
$pass = "rkdrha";
$host = "dbtrain.im.uu.se";
$dbname = "dbtrain_850";	
//Login-credentials for database	

$connection = new mysqli( $host, $uname, $pass, $dbname);
if ($connection -> connect_error)
{
	die ("Connection failed:".$connection.connect_error) ;
}
//Displays "Connection failed" on site if Connection error. Otherwise it displays nothing.

$query = "SELECT * FROM Comments";
$result = $connection -> query ($query)
?>

<html>
	<head>
		<meta charset = "UTF-8">
		<link rel = "stylesheet" type = "text/css"  href = "assets\css\css3.css" />
		<link rel='stylesheet' type='text/css' href="assets\css\style.php" />
		<style>
		
		</style>
		<title>Big Talk</title>
		<ul class="mstructure">
			<li class="mblock"><a href="Register.php">Register</a></li>
		</ul>
			<h1 id="Big">BIG TALK</h1>
	</head>
	<body onload='document.regForm.reg_usrname.focus()'>
		<div class="bar">
			<h2 id="topic"> Login to our Forum</h2>
		</div>
		<h1>Invalid Credentials. Are you sure you are a member?</h1>
		<h2>Enter Your Login-credentials:</h2>
		<form action="Login-Process.php" name="loginForm">
			<fieldset id="field">
				<div class="formId">Email:</div>
					<input class="input" type="text" name="login_usremail" required><br>
				<div class="formId">Password:</div>
					<input class="formId" type "text" name="login_password" required><br>
				<input class="subbutton"type="submit" value="Login" onclick="validateRegisterEmail(document.regForm.login_usremail)">
			</fieldset>
		</form>
		<script src="assets\js\js.js"></script>
	</body>
</html>