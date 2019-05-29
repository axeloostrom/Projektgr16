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
		<link rel='stylesheet' type='text/css' href="assets\css\style.php" />
		<!--Links to the external php & css-sheets that are being used.-->
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
   		integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
  	 crossorigin=""/>
	    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
   integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
   crossorigin=""></script>
		<ul class="mstructure">
			<li class="mblock"><a class="active" href="Index.php">Topics</a></li>
			<li class="mblock"><a href="Logout-process.php">Logout</a></li>
		</ul>
		
		<title>Uppsala Annonstorg</title>
			<h1 id="Big">För ett mer integrerat Uppsala</h1>
	</head>
	<body>
<div id="mapid">

	</div>
		<div class="annonsbar">
				<?php
					while ($row = $result -> fetch_assoc ())
					{
						echo "<h3 id='center'><span id='annonsjc'>".$row['JOB_CATEGORY']."</span></h3><br><br>";
						echo "<span id='annonsrow'><strong>Var: </strong>".$row['ADRESS'].".</span><br><br>";
						echo "<span id='annonsrow'><strong>Timersättning: </strong>".$row['WAGE']." kr/timme.</span><br><br>";
						echo "<span id='annonsrow'><strong>Uppskattad tidsåtgång: </strong>".$row['EST_TIME']." minuter.</span><br><br>";
						echo "<span id='annonsrow'><strong>Utförelsedatum: </strong>".$row['LFD'].".</span><br><br>";
						echo "<span id='annonsrow'><strong>Beskrivning: </strong>''".$row['DESCRIPTION']."''</span><br><br>";
					}
				?>
		</div>
	</body>
</html>