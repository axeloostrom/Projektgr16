<?php

session_start();
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
            <li class="mblock3"><a href="SearchService.php">Sök annons</a></li>
        	<li class="mblock3"><a class="active" href="Profile.php">Min Profil</a></li>
			<li class="mblock3"><a href="Logout-process.php">Logout</a></li>
		</ul>
		
		<title>Profilepage</title>
		
	</head>
	<body>

			
		<div class="profilediv">
			<label id="log">Min Profil</label>
			<?php
			
			$current_email = $_SESSION['email'];
			$query = "SELECT * FROM Prgr16_User WHERE Email='$current_email'";

			$result = $connection -> query($query);

			while($row = $result->fetch_assoc())
			{

				echo "<span id='profiletext'><h3> Email:<br>" . $row['Email'] .  "</h3></span>";
				echo "<span id='profiletext'><h3> Beskrivning:<br>" . $row['Merommig'] .  "</h3></span>";
				echo "<a href='ChangeProfile.php'> Ändra din profil </a>";
			}

			?>
		</div>
	 
	
	</body>
	</html>