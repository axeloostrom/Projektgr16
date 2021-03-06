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

		<form action="Register-Process.php" name="regForm" method="post"> <!--When executed it refers to the php-document Register-Process-->
			<fieldset id="field">
				<label id="log">Registrering</label> </br>
				<div class="formId">E-Mail:</div>
					<input class="input" type="text" name="reg_usremail" placeholder="E-Mail..." required><br>
				 <div class="formId">Kundtyp:</div>
				<select id="kundtyp" name="kundtyp">
					<option value="VKT" id="vkt" name="vkt">Välj kundtyp...</option>
					<option value="Annonsskapare" id="annonsör" name="annonsör">Annonsskapare</option>
					<option value="Jobbsearch" id="jobbsökande" name="jobbsökande">Jobbsökande</option>
           		</select> </br>
				   <div class="formId">Lösenord:</div>
					<input type="password" type="text" name="reg_password" placeholder="Lösenord..."required><br>
				<div class="formId">Mer om Mig:</div>
					<textarea id="texta" type="text" rows="10" cols="40" name="merommig" required></textarea>

				<input class="subbutton"type="submit" value="Create User" onclick="validateRegisterEmail(document.regForm.reg_usremail)">
				<input type="checkbox" id="check"> Godkänn.
			</fieldset>
		</form>
		<script src="assets\js\js.js"></script>
	</body>
</html>