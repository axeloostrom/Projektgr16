<?php
include 'Include/DB.php';
    $connection = dbconnect();
	authorization();
$name = trim(mysqli_real_escape_string($connection,$_POST['contactname']));
$email = ($_SESSION["email"]);
$message = trim(mysqli_real_escape_string($connection,$_POST['message']));

if (trim($name) == "" || trim($message) == "" || trim($email) == "")
{
    echo "Felaktig inmatning, försök igen!";
	header("Refresh: 2; URL=SearchService.php");
}
else
{
        
        $query = "INSERT INTO Prgr16_Jobs (EMAIL, JOB_CATEGORY, ADRESS, WAGE, EST_TIME, LFD, DESCRIPTION) 
        VALUES ('".$email."', '".$job_category."', '".$adress."', '".$wage."', '".$est_time."','".$lfd."','".$description."')"; 
        $connection -> query ($query);
        header ("Refresh: 0.2; URL=SearchService.php");
    
}