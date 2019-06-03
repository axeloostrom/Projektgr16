<?php
	include 'Include/DB.php';
	$connection = dbconnect();
	authorization(); //Checks whether the Session variable "hashed_password" has been set. 
	$email=$_SESSION['email'];
	$query = "SELECT * FROM Prgr16_Jobs  WHERE EMAIL='$email'";
	$result = $connection -> query($query);	
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
	 <div class="resultTable">
            <div class="text">
                <?php
                    while ($row = $result -> fetch_assoc ())
                    {
                        
                        echo "<span id='Adress'>Adress: <a href='Annonser.php?id=".$row['JID']."'>".$row["ADRESS"]."</a></span><br>";
                        echo "<span id='Adress'>Email: ".$row["EMAIL"]."</span><br>";
                        echo "<span id='Adress'>Jobkategori: ".$row["JOB_CATEGORY"].".</span><br>";
                        echo "<span id='Adress'>Lön: ".$row["WAGE"]." kr/timme.</span><br>";
                        echo "<span id='Adress'>Uppskattad arbetstid: ".$row["EST_TIME"]." timmar.</span><br><br>";
                        echo "<span id='Avskiljare'>***</span><br>";
                        echo "<span id='Adress'>Klicka <a href='DeleteAnnons.php?id=".$row['JID']."'>här</a> för att radera denna annons. </span><br><br><br><br>";
                    }
                ?>
            </div>
        </div>
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