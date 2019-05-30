<?php
include 'Include/DB.php';
    $connection = dbconnect();
	authorization();
$adress = trim(mysqli_real_escape_string($connection,$_POST['region']));
$email = ($_SESSION["email"]);
$est_time = trim(mysqli_real_escape_string($connection,$_POST['hours']));
$job_category = trim(mysqli_real_escape_string($connection,$_POST['service']));
$wage = trim(mysqli_real_escape_string($connection,$_POST['wage']));
$description = trim(mysqli_real_escape_string($connection,$_POST['message']));
$lfd = trim(mysqli_real_escape_string($connection,$_POST['date']));

if (trim($adress) == "" || trim($est_time) == "" || trim($job_category) == "" || trim($wage) == "" || trim($description) == "" || trim($lfd) == "" || trim($email) == "")
{
    echo "Felaktig inmatning, försök igen!";
	header("Refresh: 5; URL=UploadService.php");
}
else
{
        $query = "INSERT INTO Prgr16_Jobs (EMAIL, JOB_CATEGORY, ADRESS, WAGE, EST_TIME, LFD, DESCRIPTION) 
        VALUES ('".$email."', '".$job_category."', '".$adress."', '".$wage."', '".$est_time."','".$lfd."','".$description."')"; 
        $connection -> query ($query);
        header ("Refresh: 15; URL=SearchService.php");
    
}




?>