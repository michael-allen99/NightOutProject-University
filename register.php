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
		
		$username = $_POST["name"];
		$password = $_POST["password"];
		
		$sendresult = $conn->query("insert into users(name,password,isadmin) values ('$username', '$password', 0)");
		echo "<p>You signed up with: <br> Username: $username and Password: $password</p>";
		echo "<a href='login.html'><p>Log In</p></a>"
?>
  </body>
</html>