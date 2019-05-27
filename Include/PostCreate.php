<?php

function serverValidation($connection, $name_pre,$email_pre,$comment_pre)
{

	//Start Server-side validation
	
	
	$email_middle= test_email($email_pre);
	$email_post = test_input($email_middle); // sends the new variable to a function that validates it and saves it in a new variable
	$name_post = test_input($name_pre);
	$comment_post = test_input($comment_pre);
	
	//Insert Values in Database
	$query = "INSERT INTO Comments ( Name, Email, Comment ) VALUES ('".$name_post."','".$email_post."','".$comment_post."')";
	$connection -> query($query);
	echo $query;
	//Refreshes the homepage with the updated database which in term returns and updated homepage with the new comment in it.
	header("Refresh: 0.1; URL=Index.php");
	//End Server-side Validation
}

function test_email($data)
	{
		if (!stristr($data,"@") OR !stristr($data,".") OR strlen($data)==0) 
		{ 
			header("Location:Index.php");
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
	  if (strlen($data)==0) 
	  {
		header("Location:Index.php");
		exit();
	  }
	  return $data;
	}
?>