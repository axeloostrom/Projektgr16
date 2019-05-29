<?php
	include 'Include/DB.php';
	authorization(); //Checks whether the Session variable "hashed_password" has been set.
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
		
		<title>Uppsala Annonstorg</title>
			<h1 id="Big">För ett mer integrerat Uppsala</h1>
	</head>
	<body>

	<!--Allows the user to instantly write their name that they use when posting a comment-->
		<div class="bar">
			<h2 id="topic"> Här är den annons som du intresserade dig för.</h2>
		</div>
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