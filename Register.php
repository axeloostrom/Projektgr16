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

	</head>
	<body onload='document.regForm.reg_usremail.focus()'>
		<div class="bar">
			<h2 id="topic"> Bli en Uppis: Registrera nedan</h2>
		</div>
		<form action="Register-Process.php" name="regForm"> <!--When executed it refers to the php-document Register-Process-->
			<fieldset id="field">
				<label id="log">Registrering</label> </br>
				<div class="formId">E-Mail:</div>
					<input class="input" type="text" name="reg_usremail" placeholder="E-Mail..." required><br>
				<div class="formId">Lösenord:</div>
					<input class="formId" type="text" name="reg_password" placeholder="Lösenord..."required><br>
				<div class="formId">Mer om Mig:</div>
					<textarea id="texta" type="text" rows="10" cols="40" name="merommig" placeholder="Beskriv dig själv kortfattat..." required></textarea>

				<input class="subbutton"type="submit" value="Create User" onclick="validateRegisterEmail(document.regForm.reg_usremail)">
				<input type="checkbox" id="check"> Godkänn
			</fieldset>
		</form>
		<script src="assets\js\js.js"></script>
	</body>
</html>