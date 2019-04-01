<?php
	session_start();
	
	if (!isset($_SESSION["gatekeeper"]))
	{
		header("Location: login.html");
	}
	else
	{
?>
<!DOCTYPE html>
<html>
<head>
	<title>Adding New Venue</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
		$username = $_SESSION["gatekeeper"];
		echo "Welcome ". $_SESSION['gatekeeper'];
		echo '<form method="post" action="logout.php">
				<input type="submit" value="Log Out"/>
			  </form>
			';
		
		$venue_name = $_POST["venue_name"];
		$venue_type = $_POST["venue_type"];
		$venue_description = $_POST["venue_description"];
		
		$conn = new PDO("mysql:host=localhost;dbname=assign101;", "assign101", "Tei5or7o");
		
		$send_venue = $conn->query("insert into venues(name, type, description, username, recommended) values ('$venue_name', '$venue_type', '$venue_description', '$username', '0')");
		
		echo "<p>You have added venue $venue_name of type $venue_type and description $venue_description to the database </p>";
		echo "<a href='index.php'><p>Back home</p></a>";
	


	 ?>
	
</body>
</html>
<?php
	}
?>