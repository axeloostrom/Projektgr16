<?php
	include 'Include/DB.php';
	$connection=dbconnect();
	authorization(); //Checks whether the Session variable "hashed_password" has been set.
	$siteid = $_GET['id'];
	
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
		<?php
		$query = "SELECT * FROM Prgr16_Jobs WHERE JID=$siteid"; 
        $result= $connection -> query ($query);
		 while ($row = $result -> fetch_assoc ())
		 {
			echo $row['JOB_CATEGORY'];
			echo $row['ADRESS'];
			echo $row['WAGE'];
			echo $row['EST_TIME'];
			echo $row['LFD'];
			echo $row['DESCRIPTION'];
		 }
		?>
	</body>
</html>