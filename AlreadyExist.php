<html>
	<head>
		<meta charset = "UTF-8">
		<link rel = "stylesheet" type = "text/css"  href = "assets\css\css3.css" />
		<link rel='stylesheet' type='text/css' href="assets\css\style.php" />
		<title>Uppsala Annonstorg</title>
			<h1 id="Big">Uppsala Annonstorg</h1>
			<h1>För ett mer integrerat Uppsala</h1>
	</head>
	<body onload='document.regForm.reg_usrname.focus()'>
		<div class="bar">
			<h2 id="topic">Denna email finns redan hos oss.<br><br><br><br>Du blir nu omdirigerad...</h2>
		</div>
	</body>
</html>
	<?php
		header("Refresh:3;URL=Login.php");
	?>