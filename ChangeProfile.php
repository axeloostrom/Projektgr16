<?php
include 'Include/DB.php';
$connection = dbconnect();
authorization(); //Checks whether the Session variable "hashed_password" has been set. 
?>


<html>
	<head>
		<meta charset = "UTF-8">
		<link rel = "stylesheet" type = "text/css"  href = "assets\css\css3.css" />
		<link rel='stylesheet' type='text/css' href="assets\css\style.php" />
		<!--Links to the external php & css-sheets that are being used.-->
		
		<title>ChangeProfilepage</title>
			
	</head>
	<body>
	
	<a href="Profile.php"> Gå tillbaka </a>
	
	<h1> Ändra din profil </h1> <br>
	 
	 
	 
	 <form name = "myForm" method = "GET" action = "SendProfile.php" >
	 <fieldset id="field">   


    
	<label> Mer om mig: <br> </label> <textarea id="texta" rows="10" cols="40" name = "merommig"></textarea> <br>
	
	
	 <br> <input type = "submit" value = "Ändra" id = "ändraKnapp" class = "button">
				<br>
		<div class = "deleteprofile">
		<form id = "form" name = "form1" method = "GET" action = "deleteprofile.php" onsubmit = "submit">
		<input type = "submit" value = "Ta bort profil">
         </div>
		
		</form>
		</fieldset>

</body>
</html>	