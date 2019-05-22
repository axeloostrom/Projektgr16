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

$query = "SELECT * FROM Prgr16";
$result = $connection -> query ($query)

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
	    

	<label> Förnamn: <br> </label> <input type = "text" name = "forNamn"> <br>
	<label> Efternamn: <br> </label> <input type = "text" name = "efterNamn"> <br>
    <label> Email: <br> </label> <input type = "text" name = "mail"> <br>
	<label> Mer om mig: <br> </label> <input type = "text" name = "merommig"> <br>
	
	
	<br> <br> <input type = "submit" value = "Ändra" id = "ändraKnapp" class = "button">
		</form>
		

		<br>
		<br>
		<br>
		<div class = "deleteprofile">
		<form id = "form" name = "form1" method = "GET" action = "deleteprofile.php" onsubmit = "submit">
		<input type = "submit" value = "Ta bort profil">
         
</body>
</html>	