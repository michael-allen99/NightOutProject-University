
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
	$id = $_GET["id"];
	$name = $_GET["name"];
	
		
	$recommend_update = $conn->query("UPDATE venues SET recommended=recommended+1 WHERE ID=$id");
	
	echo "<h1> You have recommended:</h1>";
	echo "<h3> $name </h3>"
?>
  </body>
</html>