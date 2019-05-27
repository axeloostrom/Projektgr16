<html>
	<head>
		<meta charset = "UTF-8">
		<link rel = "stylesheet" type = "text/css"  href = "assets\css\css3.css" />
		<link rel='stylesheet' type='text/css' href="assets\css\style.php" />
		<title>Uppsala Annonstorg</title>
			<ul class="mstructure">
				<li class="mblock"><a class="active" href="Login.php">Log-In</a></li>
				<li class="mblock"><a href="Register.php">Register</a></li>
			</ul>
			<h1 id="Big">Uppsala Annonstorg</h1>
	
	</head>
	<body onload='document.loginForm.login_usremail.focus()'>
		<div class="bar">
			<h2 id="topic">Välkommen tillbaka till oss!</h2>
		</div>
		
		<h2>Skriv in dina användaruppgifter:</h2>
		<form action="Login-Process.php" name="loginForm">
			<fieldset id="field">
				<div class="formId">Email:</div>
					<input class="input" type="text" name="login_usremail" required><br>
				<div class="formId">Password:</div>
					<input class="formId" type "text" name="login_password" required><br>
				<input class="subbutton"type="submit" value="Login" onclick="validateLoginEmail(document.loginForm.login_usremail)">
			</fieldset>
		</form>
		<script src="assets\js\js.js"></script>
	</body>
</html>