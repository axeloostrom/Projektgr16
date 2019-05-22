<?php
// Start the session
session_start();
?>
<?php
	$uname = "dbtrain_850";
	$pass = "rkdrha";
	$host = "dbtrain.im.uu.se";
	$dbname = "dbtrain_850";		

	$connection = new mysqli( $host, $uname, $pass, $dbname);
	if ($connection -> connect_error)
	{
		die ("Connection failed:".$connection.connect_error) ;
	}

	$emailpre = $connection -> real_escape_string($_GET ["reg_usremail"]); //Fetches the input email that is used when posting a comment and saves it in a variable
	$realpasswordpre = $connection -> real_escape_string($_GET ["reg_password"]); //Fetches the inputted comment and saves it in a variable
	
	//Start of Server validation
	$emailmiddle = test_email($emailpre);
	$realpassword= test_input($realpasswordpre);
	$email = test_input($emailmiddle);
	
	function test_email($data)
	{
		if (!stristr($data,"@") OR !stristr($data,".") OR strlen($data)==0) 
		{ 
			header("Location:Register.php");
		}
		else 
		{
			return $data;
		}
	}
	function test_input($data) 
	{
	  $data = trim($data); //Removes spaces
	  $data = stripslashes($data); //Unquotes a quoted string
	  $data = htmlspecialchars($data); //Removes special chars
	  if (strlen($data)==0) 
	  {
		header("Location:Register.php");
		exit();
	  }
	  return $data;
	}
	
	//End of Server validation
	
	$salt = $connection -> real_escape_string(generateSalt());

	//Start of Hashfunction
	////Start of function generating salt

	function generateSalt() {
		 $charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789/\\][{}\'";:?.>,<!@#$%^&*()-_=+|';
		 $randStringLen = 22; //Lenght of Salt

		 $randomString = "";
		 for ($i = 0; $i < $randStringLen; $i++) {
			 $randomString .= $charset[mt_rand(0, strlen($charset) - 1)];
		 }
		 return $randomString;
	}
	////End of function generating salt

	$options = 
		[
			'salt' => $salt,
			'cost' => 12 
		];

	$hashed_password = password_hash($realpassword, PASSWORD_DEFAULT,$options);
	//End of Hashfunction

	//Start of inserting values into database
	$query = "INSERT INTO Prgr16_User ( Email, Password, Salt ) VALUES ('".$email."','".$hashed_password."','".$salt."')";
	$connection -> query($query);
	//End of insert values into database
	
	//Start of creating session variable of user-input
	$_SESSION["hashed_password"] = $hashed_password;
	//End of creating session variable of user-input
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
		
		<h2>Your account has succesfully created. Thank you!</h2>
		<h3>You will be redirected to the commentpage in 5 seconds...</h3>
	</body>
</html>
<?php	
header("Refresh: 5; URL=Index.php");
?>
