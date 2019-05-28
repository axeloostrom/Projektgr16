<?php
include 'Include/DB.php';
    $connection = dbconnect();
	authorization();

$adress = $connection -> real_escape_string($_POST['region']);
$email = $connection -> real_escape_string($_POST['mail']);
$est_time = $connection -> real_escape_string($_POST['hours']);
$job_categpry = $connection -> real_escape_string($_POST['service']);
$wage = $connection -> real_escape_string($_POST['wage']);
$description = $connection -> real_escape_string($_POST['message']);


$query = "INSERT INTO Prgr16_Jobs (Email, Job_Category, Adress, Est_Time, Wage, Description) 
        VALUES ('".$email."', '".$job_categpry."', '".$adress."', '".$wage."', '".$est_time."', '".$description."')"; 

$connection -> query ($query);
//
$querygetAID ="SELECT * FROM Prgr16_Jobs (Email) WHERE AID; FORSTÄTT HÄR IMORGON. 
        VALUES ('".$email."', '".$job_categpry."', '".$adress."', '".$wage."', '".$est_time."', '".$description."')"; ""
 $title ='Annonssida3.php';//Måste skapas av sessionsvariabel med namnet Session["AID"]. Ska ta det sista Session["AID"] och lägga till en.
    echo "$title har skapats";
    //the data
    include 'Include/CreateNewPage.php';
    $data = CreateNewPage();

    //open the file and choose the mode

    $fh = fopen($title, "a");
    fwrite($fh, $data);

    //close the file

    fclose($fh);
?>