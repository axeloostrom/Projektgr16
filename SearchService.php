<?php

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
                <option value="To be continued" id="tb" name="tb">To be continued</option>
            </select>
            </br> </br> <input type="submit" id="search" value="Sök">
            </form>

            <?php
            
            $service = $_POST['service'];
            $region = $_POST['region'];

                $query = "SELECT * FROM Prgr16_Jobs  WHERE Adress='$region' AND Job_Category='$service'";
                $result = $connection -> query($query);

        ?>
        <div class="resultTable">
            <div class="text">
                <?php		
                    while ($row = $result -> fetch_assoc ())
                    {
                        echo "<span id='Adress'>Adress: ".$row["Adress"]."</span><br>";
                        echo "<span id='Adress'>Email: ".$row["Email"]."</span><br>";
                        echo "<span id='Adress'>Jobkategori: ".$row["Job_Category"].".</span><br>";
                        echo "<span id='Adress'>Lön: ".$row["Wage"]." kr/timme.</span><br>";
                        echo "<span id='Adress'>Uppskattad arbetstid: ".$row["Est_Time"]." timmar.</span><br><br>";
                        echo "<span id='Avskiljare'>***</span><br><br><br><br>";
                    }
                ?>
            </div>
            <div class="bilder">
            </div>
        </div>
        </body>
</html>