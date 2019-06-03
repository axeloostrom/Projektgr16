<?php
	include 'Include/DB.php';
	$connection=dbconnect();
	authorization(); //Checks whether the Session variable "hashed_password" has been set.
	$siteid = $_GET['id'];
	$query = "SELECT * FROM Prgr16_Jobs WHERE JID=$siteid"; 
    $result= $connection -> query ($query);

	
?> 
<!--Selects all data from table "Comments in database.-->

<!Doctype html>
<html>
	<head>
		<meta charset = "UTF-8">
		<link rel = "stylesheet" type = "text/css"  href = "assets\css\css3.css" />
		<script src="assets\js\js.js"></script>
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" />
		<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>
		
		<!--Links to the external php & css-sheets that are being used.-->
		<ul class="mstructure">
			<?php
         $email = $_SESSION["email"];
                $query = "SELECT UTYPE FROM Prgr16_User WHERE Email='$email'"; //Select all users in db that has same email as variable "@email".
	            $result = $connection -> query ($query);
	            $row = $result->fetch_assoc();

                if($row['UTYPE'] == 'Annonsskapare')
                {
                    header("Location: UploadService.php");
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
		<title>Uppsala Annonstorg</title>
			<h1 id="Big">Här är den annons som du intresserade dig för</h1>
	</head>
	<body>
			<div id="annonsbar">
				<?php
					while ($row = $result -> fetch_assoc ())
					{
						echo "<h3 id='center'><span id='annonsjc'>".$row['JOB_CATEGORY']."</span></h3><br><br>";
						echo "<span id='annonsrow'><strong>Var: </strong>".$row['ADRESS'].".</span><br><br>";
						echo "<span id='annonsrow'><strong>Timersättning: </strong>".$row['WAGE']." kr/timme.</span><br><br>";
						echo "<span id='annonsrow'><strong>Uppskattad tidsåtgång: </strong>".$row['EST_TIME']." minuter.</span><br><br>";
						echo "<span id='annonsrow'><strong>Utförelsedatum: </strong>".$row['LFD'].".</span><br><br>";
						echo "<span id='annonsrow'><strong>Beskrivning: </strong>''".$row['DESCRIPTION']."''</span><br><br>";
						
						$annonsskaparensMail = $row['EMAIL'];

						$adress = $row['ADRESS'];
						$coordinatesQuery = "SELECT * FROM Prgr16_Coordinates WHERE ADRESS='$adress'"; 
    					$coordinatesResult= $connection -> query ($coordinatesQuery);
						$coordinatesRow = $coordinatesResult -> fetch_assoc ();
						$latitude = $coordinatesRow["LATI"];
						$longitude = $coordinatesRow["LONGI"];

					}
				?>
			</div>

			<fieldset id="map">
			<script>
				var map = L.map('map').setView([<?php echo $latitude; ?>,<?php echo $longitude; ?>], 13); 

				L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=TCvVIKqMJrAzTVI68KWq', {
					attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">© MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">© OpenStreetMap contributors</a>',
				}).addTo(map);
				var marker = L.marker([<?php echo $latitude; ?>,<?php echo $longitude; ?>]).addTo(map); 
			</script>
			</fieldset>
	<!--Start of Posting Form-->
	
		<div id="contactForm">
			<form action="mailto:<?php echo $annonsskaparensMail;?>" method="post" enctype="text/plain">
				<fieldset id="fieldcontact">
				<label id="log">Skicka meddelande till Annonsör</label> </br>
					<div >Name:</div>
						<input class="input" type="text" name="contactname" required><br> <!--First inputfield allowing user to enter the name which is linked to the comment-->
					<div>Comment:</div>
						<textarea id="texta" type="text" rows="10" cols="40"  required></textarea></br> 
					<input class="subbutton"type="submit" value="Skicka meddelande till Annonsör" onclick=" validateIndexComment(document.contactForm.message)"> <!--Submitbutton sending the email to a javascript function which validates it-->
				</fieldset>
			</form>
		</div>
	</body>
</html>