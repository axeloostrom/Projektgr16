<?php
include 'Include/DB.php';
	authorization(); //Checks whether the Session variable "hashed_password" has been set.
?>
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
			<h1 id="Big">Upp</h1>
			<h1>The forum where hard topics are discussed constructively</h1>
	</head>
        <body>
            <h1> Ladda upp tjänst </h1>
             Jobbkategori: </br>
             <form action="UploadService-Process.php" method="post">
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

               </br> Region: </br>
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
             </br> Ange din E-mail: </br>
             <input type="text" name="mail" id="mail">
             </br> Ange antal arbetstimmar: </br>
             <input type="text" name="hours" id="hours">
             </br> Ange timlön: </br>
             <input type="text" name="wage" id="wage"> </br>
             </br> Beskriv tjänsten kortfattat: </br>
             <textarea input type="text" id="message" name="message" rows="10" cols="50"></textarea>

            </br> </br> <input type="submit" id="search" value="Ladda upp">

            </form>



            </form>

