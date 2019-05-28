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
		<ul class="mstructure">
			
			<li class="mblock"><a href="#news">Logout</a></li>
		</ul>
		
		<title>Profilepage</title>
			
	</head>
	<body>
	
	<a href="ChangeProfile.php"> Ändra din profil </a>
	<h1 id="Big">My profile page</h1>
			
	
	 
	
	</body>
	</html>