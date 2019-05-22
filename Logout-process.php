<?php
// Start the session
session_start();
?>

<html>
	<head>
		<title>Logging Out</title>
	</head >
	<body>
	<?php
	session_unset(); 
	session_destroy(); 
	header("Location:Login.php");
	?>
	</body>
</html>