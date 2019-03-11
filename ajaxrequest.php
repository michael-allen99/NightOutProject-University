<?php
	$a = $_GET["venue"];
	$conn = new PDO("mysql:host=localhost;dbname=assign101;", "assign101", "Tei5or7o");

	echo "<p>You searched for " . $a . " </p>";

	$results = $conn->query("select * from venues where type='$a'");
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