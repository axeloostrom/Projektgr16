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
                        echo "<li class='mblock3'><a class ='active' href='UploadService.php'>Ladda upp annons</a></li>";
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
		<title>Uppsala Annonstorg</title>
			
	</head>
        <body>
              <div class="form">
                <form action="UploadService-Process.php" method="post">
                    <fieldset id="field">
                        <label id="log">Ladda upp tjänst</label> </br>
                    <div class="formId">Tjänst:</div>
                    <select id="service" name="service"> 
                        <option value="Välj tjänst" id="abc" name="abc">Välj tjänst...</option>
                        <option value="Barnvakt" id="Barnvakt" name="Barnvakt">Barnvakt</option>
                        <option value="Hundvakt" id="Hundvakt" name="Hundvakt">Hundvakt</option>
                        <option value="Trädgårdstjänster" id="träd" name="träd">Trädgårdstjänster</option>
                        <option value="Handling" id="handla" name="handla">Handling</option>
                        <option value="Städning" id="Städning" name="Städning">Städning</option>
                        <option value="Flytthjälp" id="Flytt" name="Flytt">Flytt- och bärhjälp</option>
                        <option value="Nation" id="Nation" name="Nation">Nation</option>
                    </select> </br>

                    <div class="formId">Område:</div>
                    <select id="region" name="region">
                        <option value="Område" id="ab" name="ab">Välj område...</option>
                        <option value="Bolanderna" id="bländer" name="bländer">Boländerna</option>
                        <option value="Luthagen" id="Lutis" name="Lutis">Luthagen</option>
                        <option value="Ekeby" id="Ekeby" name="Ekeby">Ekeby</option>
                        <option value="Rackarbergen" id="RackC" name="RackC">Rackarbergen</option>
                        <option value="Studentstaden" id="Stud" name="Stud">Studentstaden</option>
                        <option value="Centrum" id="C" name="C">Centrum</option>
                    </select> </br>
                    <div class="formId">Ange antal arbetstimmar:</div>
                        <input type="text" name="hours" id="hours" placeholder="Antal timmar...">
                    <div class="formId">Ange timlön:</div> 
                        <input type="text" name="wage" id="wage" placeholder="Ange lön..."> 
                     <div class="formId">Ange datum:</div> 
                        <input type="date" name="date" id="date">
                     <div class="formId">Beskriv tjänsten kortfattat: </div> 
                        <textarea input type="text" id="texta" name="message" rows="10" cols="50"></textarea>
                    </br> </br> <input class="subbutton"type="submit" id="search" value="Ladda upp">
               </fieldset>
                </form>
            </div>



            </form>

