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
echo "Connection worked.";

$query = "SELECT * FROM names";
$result = $connection -> query ($query)
?>

<html>
	<head>
		<title>Database of names</title>
	</head >
	<body>
		<h1> Names in a table </h1 >
		<?php
			while ($row = $result -> fetch_assoc () )
			{
				echo $row ["name"];
				echo "<br/>";
			}
		?>
		<form action ="saveName.php">
			<fieldset>
				<legend> New name </legend>
					Name: <input type ="text" name ="newName"/>
					<input type="submit" value="Save"/>
				</fieldset>
		</form >
	</body>
</html>