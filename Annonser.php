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


		<ul class="mstructure">
			<li class="mblock3"><a class="active" href="SearchService.php">Sök annons</a></li>
			<li class="mblock3"><a href="UploadService.php">Ladda upp annons</a></li>
			<li class="mblock3"><a href="Logout-process.php">Logout</a></li>
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
						}
					?>
			</div>

<?php
     // Get lat and long by address         
     //   $address = "Luthagsesplanaden";//$row['ADRESS']; // Google HQ
       // $prepAddr = str_replace(' ','+',$address);
        //$geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
        //$output= json_decode($geocode);
        //$latitude = $output->results[0]->geometry->location->lat;
        //$longitude = $output->results[0]->geometry->location->lng;

	function getLatLong($address){
    if(!empty($address)){
        //Formatted address
        $formattedAddr = str_replace(' ','+',$address);
        //Send request and receive json data by address
        $geocodeFromAddr = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=false'); 
        $output = json_decode($geocodeFromAddr);
        //Get latitude and longitute from json data
        $data['latitude']  = $output->results[0]->geometry->location->lat; 
        $data['longitude'] = $output->results[0]->geometry->location->lng;
        //Return latitude and longitude of the given address
        if(!empty($data)){
            return $data;
        }else{
            return false;
        }
    }else{
        return false;   
    }
}
$address = 'White House, Pennsylvania Avenue Northwest, Washington, DC, United States';
$latLong = getLatLong($address);
$latitude = $latLong['latitude']?$latLong['latitude']:'Not found';
$longitude = $latLong['longitude']?$latLong['longitude']:'Not found';

$geocodeFromAddr = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=true_or_false&key=GoogleAPIKey');

?>


			<div id="map">
				<script>
					function initMap()
					{
						var options = 
						{
							zoom: 12,
							center: {lat:$latitude,lng:$longitude}
						}
						var map = new google.maps.Map(document.getElementById('map'), options);
						var marker = new google.maps.Marker
						({
							position:{lat:59.859414,lng:17.619756},
							map:map
						});
						var infoWindow = new google.maps.InfoWindow
						({
							content: '<h4>Marleys Italian Cuisine</h4><p>Kyrkogårdsgatan 10</p><p>753 13 Uppsala</p>'
						});
						marker.addListener('click', function()
						{
							infoWindow.open(map, marker);
						});
					}
				</script>
				</div>
			<script
					async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9E22mdzuQsU5Lq4q_snJakE7envLT15A&callback=initMap">
			</script>
	<!--Allows the user to instantly write their name that they use when posting a comment-->
		<script src="assets\js\js.js"></script>
		<!--Links to eternal javascriptfile in order to seperate code.-->
		<!--End of Posting Form-->
	</section>

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