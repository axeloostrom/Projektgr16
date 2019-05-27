<?php
session_start();
function session()
{
// Start the session
session_start();
}

function authorization() 
{
	if ($_SESSION["hashed_password"] == null) 
		{
			header("Location:Login.php");
		}
}


function dbconnect()
{
	$uname = "dbtrain_850";
	$pass = "rkdrha";
	$host = "dbtrain.im.uu.se";
	$dbname = "dbtrain_850";	
	//Login-credentials for database	

	$connection = new mysqli( $host, $uname, $pass, $dbname);
	if ($connection -> connect_error)
	{
		die ("Connection failed:".$connection.connect_error);
	}
	//Displays "Connection failed" on site if Connection error. Otherwise it displays nothing.
	return $connection;
}

?>