<?php
	include 'Include/DB.php';
	$connection=dbconnect();
	authorization(); //Checks whether the Session variable "hashed_password" has been set.
	$siteid = $_GET['id'];
	$query = "DELETE FROM Prgr16_Jobs WHERE JID=$siteid"; 
    $result= $connection -> query ($query);
    header("Location:ChangeAnnons.php");
?> 

