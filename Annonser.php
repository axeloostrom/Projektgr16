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
			<li class="mblock"><a class="active" href="Index.php">Topics</a></li>
			<li class="mblock"><a href="Logout-process.php">Logout</a></li>
		</ul>
		
		<title>Uppsala Annonstorg</title>
			<h1 id="Big">För ett mer integrerat Uppsala</h1>

	</head>
			<div class="bar">
			<h2 id="topic"> Här är den annons som du intresserade dig för.</h2>
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
	<body>
              <div id="map"></div>
              <script>
                function initMap(){
                  var options = {
                    zoom: 12,
                    center: {lat:59.8585638,lng:17.6389267}
                  }


                  var map = new google.maps.Map(document.getElementById('map'), options);

                  var marker = new google.maps.Marker({
                    position:{lat:59.859414,lng:17.619756},
                    map:map
                  });

                  var infoWindow = new google.maps.InfoWindow({
                    content: '<h4>Marleys Italian Cuisine</h4><p>Kyrkogårdsgatan 10</p><p>753 13 Uppsala</p>'
                  });

                  marker.addListener('click', function(){
                    infoWindow.open(map, marker);
                  });
                }
              </script>
              <script
			  async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9E22mdzuQsU5Lq4q_snJakE7envLT15A&callback=initMap">
              </script>
	<!--Allows the user to instantly write their name that they use when posting a comment-->
		<script src="assets\js\js.js"></script>
		<!--Links to eternal javascriptfile in order to seperate code.-->
		<!--End of Posting Form-->

		<?php
		$query = "SELECT * FROM Prgr16_Jobs WHERE JID=$siteid"; 
        $result= $connection -> query ($query);
		 while ($row = $result -> fetch_assoc ())
		 {
			echo $row['JOB_CATEGORY'];
			echo $row['ADRESS'];
			echo $row['WAGE'];
			echo $row['EST_TIME'];
			echo $row['LFD'];
			echo $row['DESCRIPTION'];
		 }
		?>


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