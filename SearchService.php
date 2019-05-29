<?php


//Måste göra så att det krävs att man är inloggad för att söka upp tjänst

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
            <h1> Lediga tjänster </h1>
             Jobbkategori: </br>
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
			<li class="mblock"><a class="active" href="Profile.php">Min Profil</a></li>
			<li class="mblock"><a href="Logout-process.php">Logout</a></li>
		</ul>
		
		<title>Uppsala Annonstorg</title>
			<h1 id="Big">Uppsala Annonstorg</h1>
	</head>
	<body>

	<!--Allows the user to instantly write their name that they use when posting a comment-->
		<div class="bar">
			<h2 id="topic">Lediga Jobb</h2>
		</div>

             <form action="SearchService.php" method="post">
                <select id="service" name="service"> 
                    <option value="Välj tjänst" id="abc" name="abc">Välj tjänst...</option>
                    <option value="Barnvakt" id="Barnvakt" name="Barnvakt">Barnvakt</option>
                    <option value="Hundvakt" id="Hundvakt" name="Hundvakt">Hundvakt</option>
                    <option value="Trädgårdstjänster" id="träd" name="träd">Trädgårdstjänster</option>
                    <option value="Handling" id="handla" name="handla">Handling</option>
                    <option value="Städning" id="Städning" name="Städning">Städning</option>
                    <option value="Flytthjälp" id="Flytt" name="Flytt">Flytt- och bärhjälp</option>
                    <option value="Nation" id="Nation" name="Nation">Nation</option>
                    <option value="To be continued" id="tbc" name="tbc">To be continued</option>
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
                <option value="To be continued" id="tb" name="tb">Övrigt</option>
                <option value="To be continued" id="tb" name="tb">To be continued</option>
             </select>
              </br> Ange det datum ni vill arbeta: </br>
             <input type="date" name="date" id="date">
            </br> </br> <input type="submit" id="search" value="Sök">
            </form>

            <?php
            
            $service = $_POST['service'];
            $region = $_POST['region'];
            $date = $_POST['date'];
                if ($date="mm/dd/yyyy"))
                {
                $query1 = "SELECT * FROM Prgr16_Jobs  WHERE ADRESS='$region' AND JOB_CATEGORY='$service'";
                $result = $connection -> query($query1);
                }
                else 
                {
                $query2 = "SELECT * FROM Prgr16_Jobs  WHERE ADRESS='$region' AND JOB_CATEGORY='$service'AND LFD='$date';
                $result = $connection -> query($query2);
                }
            ?>
        <div class="resultTable">
            <div class="text">
                <?php		
                    while ($row = $result -> fetch_assoc ())
                    {
                        $_SESSION["JID"] =$row["JID"];
                        echo $_SESSION["JID"];
                        echo "<span id='Adress'>Adress: <a href='Annonser.php?id=".$row['JID']."'>".$row["ADRESS"]."</a></span><br>";
                        echo "<span id='Adress'>Email: ".$row["EMAIL"]."</span><br>";
                        echo "<span id='Adress'>Jobkategori: ".$row["JOB_CATEGORY"].".</span><br>";
                        echo "<span id='Adress'>Lön: ".$row["WAGE"]." kr/timme.</span><br>";
                        echo "<span id='Adress'>Uppskattad arbetstid: ".$row["EST_TIME"]." timmar.</span><br><br>";
                        echo "<span id='Avskiljare'>***</span><br><br><br><br>";
                        //Linkmodifyer.com<?php
              
                            /*if(isset($_POST['textdata'])) NEED TO CREATE NEW FILE IN ORDER FOR PATH TO WORK.
                            {
                            $data=$_POST['textdata'];
                            $fp = fopen('data.txt', 'a');
                            fwrite($fp, $data);
                            fclose($fp);
                            }
                            ?>*/
                    }
                ?>
            </div>
            <div class="bilder">
            </div>
        </div>
        </body>

</html>