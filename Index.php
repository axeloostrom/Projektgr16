<?php
// Start the session
session_start();

if (!isset($_SESSION["hashed_password"])) 
	{
		header("Location:Login.php");
	}
?>
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

$query = "SELECT * FROM Prgr16_User";
$result = $connection -> query ($query)
?> 
<!--Selects all data from table "Comments in database.-->

<!Doctype html>
<html>
	<head>
		<meta charset = "UTF-8">
		<link rel = "stylesheet" type = "text/css"  href = "assets\css\css3.css" />
		<link rel='stylesheet' type='text/css' href="assets\css\style.php" />
		<!--Links to the external php & css-sheets that are being used.-->
		<ul class="mstructure">
			<li class="mblock"><a class="active" href="Index.php">Topics</a></li>
			<li class="mblock"><a href="Logout-process.php">Logout</a></li>
		</ul>
		
		<title>Big Talk</title>
			<h1 id="Big">BIG TALK</h1>
			<h1>The forum where hard topics are discussed constructively</h1>
	</head>
	<body onload='document.usrForm.usrname.focus()'>

	<!--Allows the user to instantly write their name that they use when posting a comment-->
		<div class="bar">
			<h2 id="topic"> Topic #328: How might Industrial Countries help Developing ones most effectively?</h2>
		</div>
		<!--Start of div containing previous comments-->
		<div class="prevcomments">
		<?php
			while ($row = $result -> fetch_assoc () )
			{
				echo "<span class='Bnum'>Post #".$row["UID"]. "</span><br><br>"; //Fetches the data in the column "Bnum" from the database. Increments by one for every new comment.
				echo "<span class='Bname'>Made by: ".$row["Email"]. "</span>"; //Fetches the data in the column "Name" from the database.
				echo "<br/>";
				echo "<span class='Bcomment'>''".$row["Password"]. "'' <br/></span><br>"; //Fetches the data in the column "Bcomment" from the database.
				echo "<span class='Stars'>***</span><br><br><br>"; //Adds three stars to mark the end of a comment.
			}
		?>
		</div>
		<!--End of div containing previous comments-->
	 	<!--Start of Posting Form-->
		<form action="Posts-Create.php" name="usrForm">
			<fieldset id="field">
				<div class="formId">Name:</div>
					<input class="input" type="text" name="usrname" required><br> <!--First inputfield allowing user to enter the name which is linked to the comment-->
				<div class="formId">Email:</div>
					<input class="input" type="text" name="usremail" required><br><br> <!--Second inputfield allowing user to enter the email which is linked to the comment but not displayed-->
				<div class="formId">Comment:</div>
					<input id="commentbox" type "text" name="comment" required><br> <!--Third inputfield allowing user to write the actual comment-->
				<input class="subbutton"type="submit" onclick="validateIndexEmail(document.usrForm.usremail)"> <!--Submitbutton sending the email to a javascript function which validates it-->
			</fieldset>
		</form>
		<script src="assets\js\js.js"></script>
		<!--Links to eternal javascriptfile in order to seperate code.-->
		<!--End of Posting Form-->
	</body>
</html>