<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>title</title>
  <link rel="stylesheet" href="style.css" type="text/css">
  </head>
  <body>
  <?php
	//Start session
	session_start();
	
	//Connect to the database
	$conn = new PDO("mysql:host=localhost;dbname=assign101;", "assign101", "Tei5or7o");
	
	//Read in username and pass from form in login.html
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	//Query the username and passwords match
	$results = $conn->query("select * from users where name='$username' AND password='$password'");
	
	//Try to fetch a row
	$row = $results->fetch();
	if($row == false)
	{
		echo "<div class='sectionarea welcome'>";
		echo "Invalid login credentials<br>";
		echo "<a href='login.html'>Try again</a>";
		echo "</div>";
	}
	else
	{
		$_SESSION["gatekeeper"] = $username;
		header("Location: index.php");
	}
	
	
?>
  </body>
</html>