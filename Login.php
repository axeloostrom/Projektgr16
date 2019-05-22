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
		<title>Uppsala Annonstorg</title>
		<h1 id="Big">Uppsala Annonstorg</h1>
		<h1>Varmt välkommen hit igen!</h1>
	</head>
	<body onload='document.regForm.reg_usrname.focus()'>
		<div class="bar">
			<h2 id="topic">Logga in</h2>
		</div>
		
		<h2>Skriv in dina användaruppgifter för att söka bland tillgängliga jobb!</h2>
		<form action="LoginProcess.php" name="loginForm">
			<fieldset id="field">
				<div class="formId">Email:</div>
					<input class="input" type="text" name="login_ue" required><br>
				<div class="formId">Password:</div>
					<input class="formId" type "text" name="login_pw" required><br>
				<input class="subbutton"type="submit" value="Login" onclick="validateRegisterEmail(document.regForm.login_ue)">
			</fieldset>
		</form>
		<script src="assets\js\js.js"></script>
		<h2>Inte medlem? Registrera dig nedan.</h2>
		<ul class="mstructure">
			<li class="mblock"><a href="Register.php">Registera</a></li>
		</ul>
	</body>
</html>