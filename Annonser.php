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
			<li class="mblock"><a class="active" href="SearchService.php">Sök annons</a></li>
			<li class="mblock"><a href="Logout-process.php">Logout</a></li>
		</ul>
		<title>Uppsala Annonstorg</title>
			<h1 id="Big">För ett mer integrerat Uppsala</h1>
	</head>
	<body>
		<div class="bar">
			<h2 id="topic"> Här är den annons som du intresserade dig för.</h2>
		</div>
		<section class="masterannonsdiv">
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
						$adress = $row['ADRESS'];
						$coordinatesQuery = "SELECT * FROM Prgr16_Coordinates WHERE ADRESS='$adress'"; 
    					$coordinatesResult= $connection -> query ($coordinatesQuery);
						$coordinatesRow = $coordinatesResult -> fetch_assoc ();
						$latitude = $coordinatesRow["LATI"];
						$longitude = $coordinatesRow["LONGI"];
						echo $longitude;


					}
				?>
			</div>
		</section>
			<div id="map">
			<script>
				var map = L.map('map').setView([<?php echo $latitude; ?>,<?php echo $longitude; ?>], 13); 

				L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=TCvVIKqMJrAzTVI68KWq', {
					attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">© MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">© OpenStreetMap contributors</a>',
				}).addTo(map);
				var marker = L.marker([<?php echo $latitude; ?>,<?php echo $longitude; ?>]).addTo(map);
			</script>
			</div>
		

	<!--Start of Posting Form-->
		<form action="Posts-Create.php" name="usrForm">
			<fieldset id="field">
				<div class="formId">Name:</div>
					<input class="input" type="text" name="usrname" required><br> <!--First inputfield allowing user to enter the name which is linked to the comment-->
				<div class="formId">Email:</div>
					<input class="input" type="text" name="usremail" required><br><br> <!--Second inputfield allowing user to enter the email which is linked to the comment but not displayed-->
				<div class="formId">Comment:</div>
					<input id="commentbox" type "text" name="comment" required><br> <!--Third inputfield allowing user to write the actual comment-->
				<input class="subbutton"type="submit" onclick="validateIndexEmail(document.usrForm.usremail)"> <!--Submitbutton sending the email to a javascript function which validates it-->
			</fieldset>
		</form>
	</body>
</html>