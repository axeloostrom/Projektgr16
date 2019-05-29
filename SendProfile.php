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
$_SESSION["email"];


$ny_merommig = mysqli_real_escape_string ($connection, $_GET['merommig']);
$ny_merommig_slutgiltig = "";

if ($ny_merommig !="")
{
	$ny_merommig_slutgiltig = $ny_merommig;
}
else 
{
	echo "Fälten kan inte vara tomma!";
}

$query = "UPDATE Prgr16_User SET Merommig='$ny_merommig_slutgiltig ' WHERE Email='" . $_SESSION['email'] . "'";
$connection -> query($query);



header ("Refresh: 2, URL = ChangeProfile.php");
?>

