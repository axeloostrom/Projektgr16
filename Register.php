<?php
// Start the session
session_start();
?>

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
		<title>Uppsala Annonstorg</title>
			<h1 id="Big">Uppsala Annonstorg</h1>
			<h1>För en mer integrerad stad</h1>
	</head>
	<body onload='document.regForm.reg_usremail.focus()'>
		<div class="bar">
			<h2 id="topic"> Bli en Uppis: Registrera nedan</h2>
		</div>
		
		<h2>Register New User</h2>
		<form action="Register-Process.php" name="regForm">
			<fieldset id="field">
				<div class="formId">Email:</div>
					<input class="input" type="text" name="reg_usremail" required><br>
				<div class="formId">Password:</div>
					<input class="formId" type "text" name="reg_password" required><br>
				<input class="subbutton"type="submit" value="Create User" onclick="validateRegisterEmail(document.regForm.reg_usremail)">
			</fieldset>
		</form>
		<script src="assets\js\js.js"></script>
	</body>
</html>