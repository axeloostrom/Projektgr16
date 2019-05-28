<?php
function matchInputWithDB($connection,$row,$login_email,$login_password)
{
	if ( ! $row) //If no row exist then the input is incorrect.
	{
		echo $row;
		header("Location:Unauthorized.php"); //Redirects to Unauthorized.php
		exit();
	}
	else //Creates three new variables from data from the database.
	{
			$db_email = $row ["Email"]; 
			$db_salt = $row["Salt"] ;
			$db_password = $row["Password"];
		
		
		//Start of Hashfunction
		$options = 
			[
				'salt' => $db_salt, //Adderas till lösenordet i samband med hashningen för att öka säkerheten.
				'cost' => 12 //Increases security since a higher number means a larger amount of CPU to compute the hash.
			];
		$hashed_password = password_hash($login_password, PASSWORD_DEFAULT,$options); 
		//End of Hashfunction
		
		//Start of creating session variables of user-input
		$_SESSION["email"] = $login_email;
		$_SESSION["hashed_password"] = $hashed_password;
		$_SESSION["salt"] = $db_salt;
		$_SESSION["db_password"] = $db_password;
		//End of creating session variables of user-input
		
		if ($_SESSION["hashed_password"] != $_SESSION["db_password"]) //If the hashed password created from the user input differs to the db-password then the user is not authorize to see the comments.
		{
			session_unset(); //Unsets all values on the variables.
			session_destroy(); //Destroys the session.
			header("Location:Unauthorized.php"); //Redirects to unathorized.
		}
	}
}
?>