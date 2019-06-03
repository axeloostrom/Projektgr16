<?php
	include 'Include/DB.php';
	$connection = dbconnect();
	authorization(); //Checks whether the Session variable "hashed_password" has been set. 
    $email=$_SESSION['email'];
    $query2 = "SELECT Merommig FROM Prgr16_User WHERE EMAIL='$email'";
    $result2 = $connection -> query($query2);	
    	while ($row = $result2 -> fetch_assoc ()) 
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

                if($row['UTYPE'] != 'Annonsskapare')
                {
                    header("Location: SearchService.php");
                }

                    if ($row['UTYPE'] == 'Annonsskapare')
                    {   
                        echo "<li class='mblock3'><a href='UploadService.php'>Ladda upp annons</a></li>";
                        echo "<li class='mblock3'><a href='Profile.php'>Min Profil</a></li>";
                        echo "<li class='mblock3'><a href='Logout-process.php'>Logga ut</a></li>";
                    }
                    else
                    {
                        echo "<li class='mblock3'><a class ='active' href='SearchService.php'>Sök annons</a></li>";
                        echo "<li class='mblock3'><a href='Profile.php'>Min Profil</a></li>";
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
	
	
	 <br> <input type = "submit" value = "Ändra" id = "ändraKnapp" class="subbutton">

		<div class = "deleteprofile">
		<form id = "form" name = "form1" method = "GET" action = "deleteprofile.php" onsubmit = "submit">
		<input class="subbutton" type = "submit" value = "Ta bort profil">
         </div>
		
		</form>
		</fieldset>
	 <div class="resultTable">
            <div class="text">
                <?php
                	$email=$_SESSION['email'];
                	$query = "SELECT * FROM Prgr16_Jobs  WHERE EMAIL='$email'";
	                $result = $connection -> query($query);	
                    while ($row = $result -> fetch_assoc ())
                    {
                        
                        echo "<span id='Adress'> <strong>Adress: </strong><a href='Annonser.php?id=".$row['JID']."'>".$row["ADRESS"]."</a></span><br>";
                        echo "<span id='Adress'> <strong>Email: </strong>".$row["EMAIL"]."</span><br>";
                        echo "<span id='Adress'> <strong> Jobkategori: </strong>".$row["JOB_CATEGORY"].".</span><br>";
                        echo "<span id='Adress'> <strong>Lön: </strong>".$row["WAGE"]." kr/timme.</span><br>";
                        echo "<span id='Adress'> <strong>Uppskattad arbetstid: </strong>".$row["EST_TIME"]." timmar.</span><br><br>";
                        echo "<span id='Avskiljare'>***</span><br>";
                        echo "<span id='Adress'>Klicka <a href='DeleteAnnons.php?id=".$row['JID']."'>här</a> för att radera denna annons. </span><br><br><br><br>";
                    }
                ?>
            </div>
        </div>

</body>
</html>	