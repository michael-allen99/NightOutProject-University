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
	<title>View Reviews</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
		$conn = new PDO("mysql:host=localhost;dbname=assign101;", "assign101", "Tei5or7o");
		$id = $_GET['id'];
		
		echo "<div class='sectionarea welcome'>Welcome ". $_SESSION['gatekeeper'];
		echo '<form method="post" action="logout.php">
				<input type="submit" value="Log Out"/>
			  </form><br></div>
			';
		
		$results = $conn->query("select * from reviews where venueID=$id");
		while ($row=$results->fetch())
		{
			//if statement checks if review is approved before displaying
			if ($row["approved"] == 1)
				echo "<div class='sectionarea'><strong>Username: </strong>".$row["username"]."</br>
				<strong>Review: </strong>".$row["review"]."</br></br></div>";
			
		};
	 ?>
	
</body>
</html>
<?php
	}
?>