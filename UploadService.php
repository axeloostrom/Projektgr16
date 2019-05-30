<?php
include 'Include/DB.php';
$connection = dbconnect();
	authorization(); //Checks whether the Session variable "hashed_password" has been set.
?>
<html>
    <head>
		<meta charset = "UTF-8">
		<link rel = "stylesheet" type = "text/css"  href = "assets\css\css3.css" />
		<link rel='stylesheet' type='text/css' href="assets\css\style.php" />
		<!--Links to the external php & css-sheets that are being used.-->
		<ul class="mstructure">
            <li class='mblock4'><a class="active" href='UploadService.php'>Ladda upp annons</a></li>
            <li class="mblock4"><a href="SearchService.php">Sök annons</a></li>
        	<li class="mblock4"><a href="Profile.php">Min Profil</a></li>
			<li class="mblock4"><a href="Logout-process.php">Logout</a></li>
		</ul>
		
		<title>Uppsala Annonstorg</title>
			<h1 id="Big">Uppsala annonstorg</h1>
	</head>
        <body>
            <h1> Ladda upp tjänst </h1>
              <div class="uploadservice">
                <form action="UploadService-Process.php" method="post">
                    <h4>Tjänst</h4>
                    <select id="service" name="service"> 
                        <option value="Välj tjänst" id="abc" name="abc">Välj tjänst...</option>
                        <option value="Barnvakt" id="Barnvakt" name="Barnvakt">Barnvakt</option>
                        <option value="Hundvakt" id="Hundvakt" name="Hundvakt">Hundvakt</option>
                        <option value="Trädgårdstjänster" id="träd" name="träd">Trädgårdstjänster</option>
                        <option value="Handling" id="handla" name="handla">Handling</option>
                        <option value="Städning" id="Städning" name="Städning">Städning</option>
                        <option value="Flytthjälp" id="Flytt" name="Flytt">Flytt- och bärhjälp</option>
                        <option value="Nation" id="Nation" name="Nation">Nation</option>
                        <option value="To be continued" id="tbc" name="tbc">Övrigt</option>
                    </select> </br>

                    <h4> Område: </h4>
                    <select id="region" name="region">
                        <option value="Område" id="ab" name="ab">Välj område...</option>
                        <option value="Bolanderna" id="bländer" name="bländer">Boländerna</option>
                        <option value="Luthagen" id="Lutis" name="Lutis">Luthagen</option>
                        <option value="Ekeby" id="Ekeby" name="Ekeby">Ekeby</option>
                        <option value="Rackarbergen" id="RackC" name="RackC">Rackarbergen</option>
                        <option value="Studentstaden" id="Stud" name="Stud">Studentstaden</option>
                        <option value="Centrum" id="C" name="C">Centrum</option>
                        <option value="To Be Continued" id="tb" name="tb">To be continued</option>
                    </select> </br>
                    <h4> Ange antal arbetstimmar: </h4>
                        <input type="text" name="hours" id="hours">
                    <h4> Ange timlön: </h4>
                        <input type="text" name="wage" id="wage"> </h4>
                    <h4> Ange datum ni senast vill ha jobbet utfört: </h4>
                        <input type="date" name="date" id="date">
                    <h4> Beskriv tjänsten kortfattat: </h4>
                        <textarea input type="text" id="message" name="message" rows="10" cols="50"></textarea>
                    </br> </br> <input type="submit" id="search" value="Ladda upp">
                </form>
            </div>



            </form>

