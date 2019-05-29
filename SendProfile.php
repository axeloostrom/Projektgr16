<?php

session_start();
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
$_SESSION["merommig"];
$row["UID"];

if(!isset($row["UID"]))
{
	echo "fel";
}
else{
	echo "rätt";
}

$merommig = mysqli_real_escape_string ($connection, $_GET['merommig']);
$ny_merommig = "";

if ($merommig !="")
{
	$ny_merommig = $merommig;
}
else 
{
	echo "funka ej";
}

$query = "UPDATE Prgr16_Profile SET Merommig='$ny_merommig' WHERE UID='" . $_SESSION['UID'] . "'";
$connection -> query($query);


//header ("Refresh: 2, URL = ChangeProfile.php");
?>

