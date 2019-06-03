<?php


//Måste göra så att det krävs att man är inloggad för att söka upp tjänst
error_reporting(0);
$uname = "dbtrain_850";
$pass = "rkdrha";
$host = "dbtrain.im.uu.se";
$dbname = "dbtrain_850";		

$connection = new mysqli( $host, $uname, $pass, $dbname);
    if ($connection -> connect_error)
	{
		die ("Connection failed:".$connection.connect_error) ;
	}
?>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
        <body>
<?php
include 'Include/DB.php';
    $connection = dbconnect();
	authorization();
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
			<h1 id="Big">Uppsala Annonstorg</h1>
	</head>
	<body > <!--onload="document.frm1.submit()"-->

	<!--Allows the user to instantly write their name that they use when posting a comment-->
        <div class="form">
            <fieldset id="field">
				<label id="log">Lediga jobb</label> 
             <form action="SearchService.php" method="post">
                </br> Jobbtyp: </br>
                <select id="service" name="service"> 
                    <option value="true" id="omr1" selected="selectedd">Välj jobbtyp...</option>
                    <option value="Barnvakt" id="Barnvakt" name="Barnvakt" >Barnvakt</option>
                    <option value="Hundvakt" id="Hundvakt" name="Hundvakt">Hundvakt</option>
                    <option value="Trädgårdstjänster" id="träd" name="träd">Trädgårdstjänster</option>
                    <option value="Handling" id="handla" name="handla">Handling</option>
                    <option value="Städning" id="Städning" name="Städning">Städning</option>
                    <option value="Flytthjälp" id="Flytt" name="Flytt">Flytt- och bärhjälp</option>
                    <option value="Nation" id="Nation" name="Nation">Nation</option>
                    <option value="To be continued" id="tbc" name="tbc">To be continued</option>
                </select> 

               </br> Område: </br>
               <select id="region" name="region">
                <option value="true1" id="omr" selected="selected" >Välj område...</option>
                <option value="Bolanderna" id="bländer" name="bländer">Boländerna</option>
                <option value="Luthagen" id="Lutis" name="Lutis">Luthagen</option>
                <option value="Ekeby" id="Ekeby" name="Ekeby">Ekeby</option>
                <option value="Rackarbergen" id="RackC" name="RackC">Rackarbergen</option>
                <option value="Studentstaden" id="Stud" name="Stud">Studentstaden</option>
                <option value="Centrum" id="C" name="C">Centrum</option>
                <option value="To be continued" id="tb" name="tb">Övrigt</option>
                <option value="To be continued" id="tb" name="tb">To be continued</option>
             </select> 
              </br> Ange det datum ni vill arbeta: 
             <input type="date" name="date" id="date">
          <input  class="subbutton" type="submit" id="search" value="Sök">
            
            </form>
          </fieldset>
        </div> </br>

        <?php
        
        $service = $_POST['service'];
        $region = $_POST['region'];
        $date = $_POST['date'];
            
            if ($date == null)
            {
            $query1 = "SELECT * FROM Prgr16_Jobs  WHERE ADRESS='$region' AND JOB_CATEGORY='$service'";
            $result = $connection -> query($query1);
            }
            else 
            {
            $query2 = "SELECT * FROM Prgr16_Jobs  WHERE ADRESS='$region' AND JOB_CATEGORY='$service' AND LFD='$date'";
            $result = $connection -> query($query2);
            }
        ?>

        
                <?php	

                if($_POST['true'] && $_POST['true1'])
                {
                    echo "</br>";
                }
                else
                {
                    while ($row = $result -> fetch_assoc ())
                        {
                            echo  "</br><div class='resultTable'>";
                            echo  "<div class='text>";
                            echo "<span id='Adress'>Adress: <a href='Annonser.php?id=".$row['JID']."'>".$row["ADRESS"]."</a></span><br>";
                            echo "<span id='Adress'>Datum: ".$row["LFD"]."</span><br>";
                            echo "<span id='Adress'>Jobkategori: ".$row["JOB_CATEGORY"].".</span><br>";
                            echo "<span id='Adress'>Lön: ".$row["WAGE"]." kr/timme.</span><br>";
                            echo "<span id='Adress'>Uppskattad arbetstid: ".$row["EST_TIME"]." timmar.</span><br><br>";
                            echo "<span id='Avskiljare'>***</span><br><br><br><br>";
                        }      
                }

                    
                ?>
            </div>
        </div>
        </body>

</html>