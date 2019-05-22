<?php
// Start the session
session_start();

	$uname = "dbtrain_850";
	$pass = "rkdrha";
	$host = "dbtrain.im.uu.se";
	$dbname = "dbtrain_850";		

	$connection = new mysqli( $host, $uname, $pass, $dbname);
	if ($connection -> connect_error)
	{
		die ("Connection failed:".$connection.connect_error) ;
	}

$adress = $_POST['region'];
$email = $_POST['mail'];
$est_time = $_POST['hours'];
$job_categpry = $_POST['service'];
$wage = $_POST['wage'];
$description = $_POST['message'];

$query = "INSERT INTO Prgr16_Jobs (Email, Job_Category, Adress, Est_Time, Wage, Description) 
        VALUES ('".$email."', '".$job_categpry."', '".$adress."', '".$wage."', '".$est_time."', '".$description."')"; 

$connection -> query ($query);


?>