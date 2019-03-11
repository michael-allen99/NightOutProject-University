
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>title</title>
  <link rel="stylesheet" href="style.css" type="text/css">
  </head>
  <body>
  <?php
	session_start();
	
	$review = $_POST["review_comment"];
	$id = $_POST["id"];
	$username = $_SESSION["gatekeeper"];
	
	$conn = new PDO("mysql:host=localhost;dbname=assign101;", "assign101", "Tei5or7o");
	
	$send_review = $conn->query("insert into reviews(venueID, username, review, approved) values ($id, '$username', '$review', '0')");
	echo "<p>You have reviewed the venue with the following: $review</p>";
	echo "<a href='index.php'><p>Back Home<p></a>";

	

?>
  </body>
</html>