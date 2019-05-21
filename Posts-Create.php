<?php
$uname = "dbtrain_850";
$pass = "rkdrha";
$host = "dbtrain.im.uu.se";
$dbname = "dbtrain_850";	
//Login-credentials for database	

$connection = new mysqli( $host, $uname, $pass, $dbname);
if ($connection -> connect_error)
{
	die ("Connection failed:".$connection.connect_error) ;
}
//Displays "Connection failed" on site if Connection error. Otherwise it displays nothing.

$name_pre = $connection -> real_escape_string($_GET ["usrname"]); //Fetches the input username that is used when posting a comment and saves it in a variable
$email_pre = $connection -> real_escape_string($_GET ["usremail"]); //Fetches the input email that is used when posting a comment and saves it in a variable
$comment_pre = $connection -> real_escape_string($_GET ["comment"]); //Fetches the inputted comment and saves it in a variable

//Start Server-side validation
	  //$email_middle= test_email($email_pre)
	  $email_post = test_input($email_pre); // sends the new variable to a function that validates it and saves it in a new variable
	  
	  
	  $name_post = test_input($name_pre);
	  $comment_post = test_input($comment_pre);

	  //function test_email($data){
	 // if (!stristr($data,"@") OR !stristr($data,".")) 
	// { 
		//header("Location: http://example.com/thankyou.php");
	 //}
	 //else {
	 //return $data;
	 //}
	  
	function test_input($data) {
	  $data = trim($data); //Removes spaces
	  $data = stripslashes($data); //Unquotes a quoted string
	  $data = htmlspecialchars($data); //Removes special chars
	  return $data;
	}
	//End Server-side Validation
	//Insert Values in Database

		$query = "INSERT INTO Comments ( Name, Email, Comment ) VALUES ('".$name_post."','".$email_post."','".$comment_post."')";
		$connection -> query($query);
		echo $query;
	//Refreshes the homepage with the updated database which in term returns and updated homepage with the new comment in it.
header("Refresh: 0.1; URL=Index.php");

?>