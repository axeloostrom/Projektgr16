<?php
include 'Include/DB.php';
	authorization(); //Checks whether the Session variable "hashed_password" has been set.

$query = "SELECT * FROM Prgr16_Jobs WHERE AID='$_SESSION["AID"]'";
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
			echo $row["Job_Category"];
			echo $row["Adress"];
			echo $row["Wage"];
			echo $row["Est_Time"];
			}
		?>
	</body>
</html>