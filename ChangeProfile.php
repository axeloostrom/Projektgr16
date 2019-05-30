<?php
	include 'Include/DB.php';
	$connection = dbconnect();
	authorization(); //Checks whether the Session variable "hashed_password" has been set. 
	$email=$_SESSION['email'];
	$query = "SELECT * FROM Prgr16_User  WHERE EMAIL='$email'";
	$result = $connection -> query($query);	
	while ($row = $result -> fetch_assoc ()) 
	 {
		$description = $row["Merommig"];
	 }
?>


<html>
	<head>
		<meta charset = "UTF-8">
		<link rel = "stylesheet" type = "text/css"  href = "assets\css\css3.css" />
		<link rel='stylesheet' type='text/css' href="assets\css\style.php" />
		<!--Links to the external php & css-sheets that are being used.-->
		
		<title>ChangeProfilepage</title>
		<ul class="mstructure">
            <li class="mblock3"><a href="SearchService.php">Sök annons</a></li>
        	<li class="mblock3"><a class="active" href="Profile.php">Min Profil</a></li>
			<li class="mblock3"><a href="Logout-process.php">Logout</a></li>
		</ul>
	</head>
	<body>
	 
	 <form name = "myForm" method = "GET" action = "SendProfile.php" >
	 <fieldset id="field">   

    <label id="log">Min Profil</label> </br>
	<label> Mer om mig: <br> </label> <textarea id="texta" rows="10" cols="40" name = "merommig"><?php echo $description; ?></textarea> <br>
	
	
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