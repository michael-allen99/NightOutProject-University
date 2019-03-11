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
	<title>Venue Search</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
		$type = $_GET["venue_type"];
		$conn = new PDO("mysql:host=localhost;dbname=assign101;", "assign101", "Tei5or7o");
		
		echo "<div class='sectionarea welcome'>Welcome ". $_SESSION['gatekeeper'];
		echo '<form method="post" action="logout.php">
				<input type="submit" value="Log Out"/>
			  </form></div>
			';
		
		echo "<div class='sectionarea welcome'><p>You searched for $type </p></div>";

		$results = $conn->query("select * from venues where type='$type'");
		while ($row=$results->fetch())
		{
			$name = $row["name"];
			echo "<div class='sectionarea'>";
			echo "<strong>Venue Name: </strong>".$row["name"]."</br>";
			echo "<strong>Venue Type: </strong>".$row["type"]."</br>";
			echo "<strong>Venue Description: </strong>".$row["description"]."</br>";
			echo "<strong>Recommendations: </strong>".$row["recommended"]."</br>";
			echo "<a href='recommend.php?id=" . $row['ID'] . "&name="  . $row['name']."'>Recommend this venue</a></br>";
			echo "<a href='viewreview.php?id=" . $row['ID'] . "&name="  . $row['name']."'>View reviews for this venue</a>";
			echo "<h3>Leave a review for $name</h3>";
			$id = $row['ID'];
			echo "<form method='post' action='review.php'>";
			echo "<input type='hidden' name='id' value=$id>";
			echo "<input type='text' name='review_comment'>";
			echo "<input type='submit' name='Submit Review'>";
			echo "</form><br><br><br></div>";
			
		}
	?>
</body>
</html>
<?php
	}
?>