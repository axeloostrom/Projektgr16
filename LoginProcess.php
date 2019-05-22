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

	$login_email = $connection -> real_escape_string($_GET ["login_usremail"]); //Fetches the input email that is used when user logs in and saves it in a variable
	$login_password = $connection -> real_escape_string($_GET ["login_password"]); //Fetches the inputted user password and saves it in a variable.

		$query = "SELECT * FROM Prgr16_User WHERE Email='$login_email'";
		$result = $connection -> query ($query);
		//Start fetching database-values for later comparison
		$row = $result->fetch_assoc();
		if ( ! $row) 
		{
			echo $row;
			header("Location:Unauthorized.php");
			exit();
		}
		else
			{
				$db_email = $row ["Email"];
				$db_salt = $row["Salt"] ;//Fungerar
				$db_password = $row["Password"];
			
			//Start of Hashfunction
			$options = 
				[
					'salt' => $db_salt,
					'cost' => 12 
				];
			$hashed_password = password_hash($login_password, PASSWORD_DEFAULT,$options);
			//End of Hashfunction
			//Start of creating session variables of user-input
			$_SESSION["email"] = $login_email;
			$_SESSION["hashed_password"] = $hashed_password;
			$_SESSION["salt"] = $db_salt;
			$_SESSION["db_password"] = $db_password;
			//End of creating session variables of user-input
			
			if ($_SESSION["hashed_password"] != $_SESSION["db_password"]) 
			{
				$message = "The password is incorrect!";
				echo "<script type='text/javascript'>alert('$message');</script>";
				session_unset(); 
				session_destroy();
				header("Refresh:0.1; Location:Unauthorized.php");
				
			}
		}
?>
<html>
	<head>
		<meta charset = "UTF-8">
		<link rel = "stylesheet" type = "text/css"  href = "assets\css\css3.css" />
		<link rel='stylesheet' type='text/css' href="assets\css\style.php" />
		<style>
		
		</style>
		<title>Big Talk</title>
			<h1 id="Big">BIG TALK</h1>
			<h1>The forum where hard topics are discussed constructively</h1>
	</head>
	<body>
		<div class="bar">
			<h2 id="topic"> Login Succesful.</h2>
		</div>
		<h3>You will be redirected to the commentpage in 5 seconds...</h3>
	</body>
</html>
<?php	
	header("Refresh: 3; URL=Index.php");
?>