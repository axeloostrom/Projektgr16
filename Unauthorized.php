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

?>

<html>
	<head>
		<meta charset = "UTF-8">
		<link rel = "stylesheet" type = "text/css"  href = "assets\css\css3.css" />
		<link rel='stylesheet' type='text/css' href="assets\css\style.php" />
		<style>
		
		</style>
		<title>Uppsala Annonstorg</title>
			<h1 id="Big">Uppsala Annonstorg</h1>
	</head>
	<body onload='document.regForm.login_ue.focus()'>
		<div class="bar">
			<h2 id="topic">Välkommen tillbaka till oss!</h2>
		</div>
		<h1>Ogiltiga Användaruppgifter. Är du säker på att du är medlem?</h1>
		<h2>Skriv in dina användaruppgifter:</h2>
		<form action="LoginProcess.php" name="loginForm">
			<fieldset id="field">
				<div class="formId">Email:</div>
					<input class="input" type="text" name="login_ue" required><br>
				<div class="formId">Lösenord:</div>
					<input class="formId" type "text" name="login_pw" required><br>
				<input class="subbutton"type="submit" value="Login" onclick="validateRegisterEmail(document.loginForm.login_ue)">
			</fieldset>
		</form>
		<script src="assets\js\js.js"></script>
		<ul class="mstructure">
			<li class="mblock"><a href="Register.php">Registera</a></li>
		</ul>
</html>