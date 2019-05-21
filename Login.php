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

$query = "SELECT * FROM Prgr16_User";
$result = $connection -> query ($query)
?>

<html>
	<head>
		<meta charset = "UTF-8">
		<link rel = "stylesheet" type = "text/css"  href = "assets\css\css.css" />
		<link rel='stylesheet' type='text/css' href="assets\css\style.php" />
		<style>
		
		</style>
		<title>Big Talk</title>
			<h1 id="Big">BIG TALK</h1>
			<h1>The forum where hard topics are discussed constructively</h1>
	</head>
	<body onload='document.regForm.reg_usrname.focus()'>
		<div class="bar">
			<h2 id="topic"> Join Our Forum: Register Below</h2>
		</div>
		
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