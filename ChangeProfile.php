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
                      <?php

                $email = $_SESSION["email"];
                $query = "SELECT UTYPE FROM Prgr16_User WHERE Email='$email'"; //Select all users in db that has same email as variable "@email".
	            $result = $connection -> query ($query);
	            $row = $result->fetch_assoc();
                    if ($row['UTYPE'] == 'Annonsskapare')
                    {   
                        echo "<li class='mblock3'><a href='UploadService.php'>Ladda upp annons</a></li>";
                        echo "<li class='mblock3'><a class ='active' href='Profile.php'>Min Profil</a></li>";
                        echo "<li class='mblock3'><a href='Logout-process.php'>Logga ut</a></li>";
                    }
                    else
                    {
                        echo "<li class='mblock3'><a href='SearchService.php'>Sök annons</a></li>";
                        echo "<li class='mblock3'><a class ='active' href='Profile.php'>Min Profil</a></li>";
                        echo "<li class='mblock3'><a href='Logout-process.php'>Logga ut</a></li>";
                    }

            ?>
		
		</ul>
			<h1 id="Big">Uppsala Annonstorg</h1>
	</head>
	<body>
	 
	 <form name = "myForm" method = "GET" action = "SendProfile.php" >
	 <fieldset id="field">   

    <label id="log">Min Profil</label> </br>
	<label> Mer om mig: <br> </label> <textarea id="texta" rows="10" cols="40" name = "merommig"><?php echo $description; ?></textarea> <br>
	
	
	  <input  class="subbutton" type = "submit" value = "Ändra" id = "ändraKnapp" class = "button">
				<br>
		
			
		</fieldset>
		</form>
</body>
</html>	