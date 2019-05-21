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

	$email = $connection -> real_escape_string($_GET ["reg_usremail"]); //Fetches the input email that is used when posting a comment and saves it in a variable
	$realpassword = $connection -> real_escape_string($_GET ["reg_password"]); //Fetches the inputted comment and saves it in a variable
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
	$query = "INSERT INTO User ( Email, Password, Salt ) VALUES ('".$email."','".$hashed_password."','".$salt."')";
	$connection -> query($query);
	//End of insert values into database
	
	//Start of creating session variables of user-input
	$_SESSION["email"] = $email;
	$_SESSION["password"] = $hashed_password;
	$_SESSION["salt"] = $salt;
	//End of creating session variables of user-input
?>		
<html>
	<head>
		<meta charset = "UTF-8">
		<link rel = "stylesheet" type = "text/css"  href = "assets\css\css.css" />
		<link rel='stylesheet' type='text/css' href="assets\css\style.php" />
		<style>
		
		</style>
		<title>Big Talk</title>
			<h1 id="Big">BIG TALK</h1>
			<h1>The forum where hard topics are discussed constructively</h1>
	</head>
	<body onload='document.regForm.reg_usrname.focus()'>
		<div class="bar">
			<h2 id="topic"> Join Our Forum: Register Below</h2>
		</div>
		
		<h2>Your account has succesfully saved. Thank you!</h2>
		<h3>You will be redirected to the commentpage in 5 seconds...</h3>
	</body>
</html>
<?php	
echo "Your username is: " . $_SESSION["email"] . ".<br>";
header("Refresh: 5; URL=Index.php");
?>
