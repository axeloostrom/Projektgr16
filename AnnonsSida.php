<?php
$uname = "dbtrain_850";
$pass = "rkdrha";
$host = "dbtrain.im.uu.se";
$dbname = "dbtrain_850";	
//Login-credentials for database	

$connection = new mysqli( $host, $uname, $pass, $dbname);
if ($connection -> connect_error)
{
	die ("Connection failed:".$connection.connect_error) ;
}
//Displays "Connection failed" on site if Connection error. Otherwise it displays nothing.

$query = "SELECT * FROM Prgr16_Jobs WHERE AID='1'";
$result = $connection -> query ($query)

?>

<html>
	<head>
		<meta charset = "UTF-8">
		<link rel = "stylesheet" type = "text/css"  href = "assets\css\css.css" />
		<link rel='stylesheet' type='text/css' href="assets\css\style.php" />
		<style>
		
		</style>
		<title>Big Talk</title>
			<h1 id="Big">BIG TALK</h1>
			<h1>Annonsens Namn</h1>
	</head>
	
	<body>
		<?php

			while ($row = $result -> fetch_assoc())
			{
			echo $row['Emp_Name']
			echo $row['Job_Category']
			echo $row['Adress']
			echo $row['Wage']
			echo $row['Est_Time']
			}
		?>
	</body>
</html>