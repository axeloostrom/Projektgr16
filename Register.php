<html>
	<head>
		<meta charset = "UTF-8">
		<link rel = "stylesheet" type = "text/css"  href = "assets\css\css3.css" />
		<link rel='stylesheet' type='text/css' href="assets\css\style.php" />
		<style>
		
		</style>
		<title>Uppsala Annonstorg</title>
		<ul class="mstructure">
			<li class="mblock"><a href="Login.php">Log-In</a></li>
			<li class="mblock"><a class="active" href="Register.php">Register</a></li>
		</ul>
			<h1 id="Big">Uppsala Annonstorg</h1>
			<h1>För en mer integrerad stad</h1>
	</head>
	<body onload='document.regForm.reg_usremail.focus()'>
		<div class="bar">
			<h2 id="topic"> Bli en Uppis: Registrera nedan</h2>
		</div>
		
		<h2>Register New User</h2>
		<form action="Register-Process.php" name="regForm"> <!--When executed it refers to the php-document Register-Process-->
			<fieldset id="field">
				<div class="formId">Email:</div>
					<input class="input" type="text" name="reg_usremail" required><br>
				<div class="formId">Password:</div>
					<input class="formId" type "text" name="reg_password" required><br>
					<h4 class="reminder">Remember that the password and e-mail has to be 8 characters or longer!</h4>
				<input class="subbutton"type="submit" value="Create User" onclick="validateRegisterEmail(document.regForm.reg_usremail)">
			</fieldset>
		</form>
		<script src="assets\js\js.js"></script>
	</body>
</html>