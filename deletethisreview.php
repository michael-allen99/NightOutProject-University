<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>title</title>
  <link rel="stylesheet" href="style.css" type="text/css">
  </head>
  <body>
  <?php
	$conn = new PDO("mysql:host=localhost;dbname=assign101;", "assign101", "Tei5or7o");
	$id = $_POST["id"];
	
		
	$approve_review = $conn->query("DELETE FROM reviews WHERE id=$id");
	
	echo "<h1> You have deleted this review</h1>";
	echo "<h3> <a href='approvereview.php'>Back</a> </h3>"
?>
  </body>
</html>