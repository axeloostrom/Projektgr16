<?php
	include 'Include/DB.php';
	$connection = dbconnect(); 

	$login_email = $connection -> real_escape_string($_GET ["login_usremail"]); //Fetches the input email that is used when user logs in and saves it in a variable
	$login_password = $connection -> real_escape_string($_GET ["login_password"]); //Fetches the inputted user password and saves it in a variable.
		$query = "SELECT * FROM Prgr16_User WHERE Email='$login_email'";
		$result = $connection -> query ($query);
		//Start fetching database-values for later comparison
		$row = $result->fetch_assoc();
		include 'Include/LoginValidation.php';
		matchInputWithDB($connection,$row,$login_email,$login_password); //Sends four variables to this function on the LoginValidation-php page.
		$_SESSION["email"] = $login_email;

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
	</head>
	<body onload='document.regForm.reg_usrname.focus()'>
			<h2 id="snygg">Du blir nu omdirigerad...</h2>
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
	</body>
</html>
