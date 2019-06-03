<?php
	include 'Include/DB.php';
	$connection = dbconnect();
	$emailpre = $connection -> real_escape_string($_POST ["reg_usremail"]); //Fetches the input email that is used when posting a comment and saves it in a variable
	$realpasswordpre = $connection -> real_escape_string($_POST ["reg_password"]); //Fetches the inputted comment and saves it in a variable
	$merommigpre = $connection -> real_escape_string($_POST ["merommig"]);
	$kundtyp = $connection -> real_escape_string($_POST ["kundtyp"]);
	
	//Start of Server validation
	include 'Include/ServerValidationRegister.php';
	$emailmiddle = test_email($emailpre); //Initial test of email checking whether it contains '@' and '.'.
	$realpassword= test_input($realpasswordpre); //Test of password checking the length of it after removing spaces, special characters and unquoting the string.
	$email = test_input($emailmiddle);
	$merommig = test_input($merommigpre);

	$query = "SELECT * FROM Prgr16_User WHERE Email='$email'"; //Select all users in db that has same email as variable "@email".
	$result = $connection -> query ($query);
	$row = $result->fetch_assoc();
	$_SESSION["email"] = $email;

	
	insertToDB($connection,$row,$email,$realpassword,$merommig,$kundtyp); //Insert to db if no rows are returned.
	
?>		
<html>
	<head>
		<meta charset = "UTF-8">
		<link rel = "stylesheet" type = "text/css"  href = "assets\css\css3.css" />
		<link rel='stylesheet' type='text/css' href="assets\css\style.php" />
		<style>
		
		</style>
		<title>Uppsala Annonstorg</title>
			<h1 id="Big">Uppsala Annonstorg</h1>
			<h1>För ett mer integrerat Uppsala</h1>
	</head>
	<body>
		
			<h2 id="snygg">Vi försöker nu skapa ditt användarkonto...</h2>
		
		<h3>Du kommer bli omdirigerad till annonssidan inom 3 sekunder...</h3>
	</body>
</html>
<?php	

    $email = $_SESSION["email"];
    $query = "SELECT UTYPE FROM Prgr16_User WHERE Email='$email'"; //Select all users in db that has same email as variable "@email".
	$result = $connection -> query ($query);
	$row = $result->fetch_assoc();
        if ($row['UTYPE'] == 'Annonsskapare')
            {   
            	header("Refresh: 3; URL=UploadService.php");
            }
		else header("Refresh: 3; URL=SearchService.php");

?>
