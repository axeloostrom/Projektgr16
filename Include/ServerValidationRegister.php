<?php

function test_email($data)
	{
		if (!stristr($data,'@') OR !stristr($data,'.') OR strlen($data)==0 OR stristr($data,'å') OR stristr($data,'Å') OR stristr($data,'ä') OR stristr($data,'Ä') OR stristr($data,'ö') OR stristr($data,'Ö')) //
		{ 
			header("Location:Register.php"); //Redirects to Register.php
			exit();
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
	  if (strlen($data)<8) //Needs to be 8 Characters or longer
	  {
		header("Location:TooShort.php"); //Redirects to TooShort.php
		exit();
	  }
	  else
	  {
		return $data;
	  }
	}
	
function insertToDB($connection,$row,$email,$realpassword,$merommig,$kundtyp)
{
	if ( ! $row) //If it doesn´t return any rows it means that the email doesnt exist and should therefore be allowed to insert.
	{
		$salt = $connection -> real_escape_string(generateSalt());

		//Start of Hashfunction

		$options = 
			[
				'salt' => $salt,
				'cost' => 12 
			];

		$hashed_password = password_hash($realpassword, PASSWORD_DEFAULT,$options);
		//End of Hashfunction

		//Start of inserting values into database
		$query = "INSERT INTO Prgr16_User (Email, Password, Salt,Merommig,UTYPE) VALUES ('".$email."','".$hashed_password."','".$salt."','".$merommig."','".$kundtyp."')";
		$connection -> query($query);

		//End of insert values into database
		
		//Start of creating session variable of user-input
		$_SESSION["hashed_password"] = $hashed_password;
		$_SESSION["email"] =$email;
		//End of creating session variable of user-input
	}
	
	else //Otherwise the email-adress exist and the user is being redirected back to the register site.
	{
		header("Location:AlreadyExist.php"); //Redirects to AlreadyExist.php
	}
}
	
//Start of function generating salt
function generateSalt() 
{
	 $charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789/\\][{}\'";:?.>,<!@#$%^&*()-_=+|'; //The available letters to randomize among.
	 $randStringLen = 22; //Length of Salt

	 $randomString = ""; //The original string that will be added random chars to.
	 for ($i = 0; $i < $randStringLen; $i++) {
		 $randomString .= $charset[mt_rand(0, strlen($charset) - 1)]; //For loop which contatinates a random number to the empty string.
	 }

	 return $randomString;
}
//End of function generating salt

//End of Server validation
?>