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



$mom = "hej";
$pass = $connection -> real_escape_string ($_GET["efterNamn"]);
$email = $connection -> real_escape_string ($_GET["mail"]);
$salt = $connection -> real_escape_string ($_GET["merommig"]);
if ($email="")
{
	
}
else
{
	$_Session["merommig"] = $email;
}
if ($email="")
{
	


$query = "INSERT INTO Prgr16_Profile (First, Efternamn, Email, Merommig) VALUES ('".$email."', '".$pass."', '".$salt."', '".$mom."')";
$connection -> query($query);
echo $query;

header ("Refresh: 2, URL = ChangeProfile.php");
?>