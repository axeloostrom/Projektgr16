<html>
	<head>
		<meta charset = "UTF-8">
		<link rel = "stylesheet" type = "text/css"  href = "assets\css\css3.css" />
		<link rel='stylesheet' type='text/css' href="assets\css\style.php" />
		<title>Uppsala Annonstorg</title>

			<ul class="mstructure">
				<li class="mblock"><a class ='active' href="Login.php">Log-In</a></li>
				<li class="mblock"><a href="Register.php">Register</a></li>
			</ul>
					<h1 id="Big">Uppsala Annonstorg</h1>

	
	</head>
	<body onload='document.loginForm.login_usremail.focus()'>

		<div class="form">
	
		<form action="Login-Process.php" name="loginForm">
			
			<fieldset id="field">
				<label id="log">Logga in</label> </br>
				<div class="formId">E-Mail:</div>
					<input class="input" type="text" name="login_usremail" placeholder="E-Mail..." required><br>
				<div class="formId">Lösenord:</div>
					<input class="input" type="password" name="login_password" placeholder="Lösenord..." required><br>
				<input class="subbutton"type="submit" value="Login" onclick="validateLoginEmail(document.loginForm.login_usremail)">
					<input type="checkbox" id="check"> Kom ihåg mig 
			</fieldset>
		</form>
		</div>
		<script src="assets\js\js.js"></script>
	</body>
</html>