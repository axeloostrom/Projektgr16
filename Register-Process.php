<?php
	include 'Include/DB.php';
	$connection = dbconnect();
	$emailpre = $connection -> real_escape_string($_GET ["reg_usremail"]); //Fetches the input email that is used when posting a comment and saves it in a variable
	$realpasswordpre = $connection -> real_escape_string($_GET ["reg_password"]); //Fetches the inputted comment and saves it in a variable
	$merommigpre = $connection -> real_escape_string($_GET ["merommig"]);
	
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
	
	insertToDB($connection,$row,$email,$realpassword,$merommig); //Insert to db if no rows are returned.
	
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
		<div class="bar">
			<h2 id="topic">Vi försöker nu skapa ditt användarkonto...</h2>
		</div>
		<h3>Du kommer bli omdirigerad till annonssidan inom 3 sekunder...</h3>
	</body>
</html>
<?php	
header("Refresh: 10; URL=SearchService.php");
?>
