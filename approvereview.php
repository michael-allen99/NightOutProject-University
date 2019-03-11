<?php
	session_start();
	
	if ($_SESSION["gatekeeper"] != 'admin')
	{
		echo "Only admins can access this page";
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
			  </form><br>
			  <a href="index.php"><p>Back to home<p></a></div>
			';
		
		echo "<div class='sectionarea'><h1 style='text-align: center;'>Approve Reviews on this page</h1></div>";
		
		$results = $conn->query("select * from reviews");
		while ($row=$results->fetch())
		{
			$id = $row["ID"];
			//if statement checks if review is approved before displaying
			if ($row["approved"] == 0)
				echo "<div class='sectionarea'><strong>Venue ID:</strong> ".$row["venueID"]."</br>
				<strong>Username:</strong> ".$row["username"]."</br>
				<strong>Review: </strong>".$row["review"]."</br>
				<form method='post' action='approvethisreview.php'>
					<input type='hidden' name='id' value=$id>
					<div class='approve'><input type='submit' value='Approve Review'></div>
				</form><br>
				<form method='post' action='deletethisreview.php'>
					<input type='hidden' name='id' value=$id>
					<div class='remove'><input type='submit' value='Remove Review'></div>
				</form><br><br></div>";
			
		};
	 ?>
	
</body>
</html>
<?php
	}
?>